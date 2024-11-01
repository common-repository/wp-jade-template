<?php
/**
 * @package WP Jade Template
 * @version 1.0
 */

/*
Plugin Name: WP Jade Template
Plugin URI: http://wordpress.org/plugins/wp-jade-template/
Description: This plugin enables to use jade template engine for the template files.
Author: Xing
Author URI: http://www.webuddysoft.com/
Version: 1.0
*/

require(__DIR__.'/phpjade/autoload.php.dist');
use Everzet\Jade\Dumper\PHPDumper,
        Everzet\Jade\Visitor\AutotagsVisitor,
        Everzet\Jade\Filter\JavaScriptFilter,
        Everzet\Jade\Filter\CDATAFilter,
        Everzet\Jade\Filter\PHPFilter,
        Everzet\Jade\Filter\CSSFilter,
        Everzet\Jade\Parser,
        Everzet\Jade\Lexer\Lexer,
        Everzet\Jade\Jade;

function wp_jade_template_engine( $template ) {

  $dumper = new PHPDumper();
  $dumper->registerVisitor('tag', new AutotagsVisitor());
  $dumper->registerFilter('javascript', new JavaScriptFilter());
  $dumper->registerFilter('cdata', new CDATAFilter());
  $dumper->registerFilter('php', new PHPFilter());
  $dumper->registerFilter('style', new CSSFilter());

  // Initialize parser & Jade
  $parser = new Parser(new Lexer());
  $jade   = new Jade($parser, $dumper);


  if (!strstr($template, '.jade'))
  {
    $template_jade = str_replace('.php', '.jade.php', $template);
  }else{
    $template_jade = $template;
  }

  // Parse a template (both string & file containers)
  if(file_exists($template_jade))
  {
    eval('?>' . $jade->render($template_jade) . '<?php ');
    return '';
  }

  return $template;
}

// run wp jade template engine
add_filter( 'template_include', 'wp_jade_template_engine', 99999 );