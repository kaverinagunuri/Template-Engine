<?php 

class Template{
    private $vars=array();
    public function assign($key,$value)
    {
        $this->vars[$key]=$value;
    }
    public function  render($template_name){
        $path=$template_name.'.php';
        if(file_exists($path))
        {
            $contents=  file_get_contents($path);
            //echo $contents;
            foreach ($this->vars as $key=>$value ){
                $contents=  preg_replace('/\['.$key.'\]/', $value, $contents);
            }
            $contents=  preg_replace('/\<\!\-\- if(.*) \-\-\>/','<?php if($1):  ?>', $contents);
             $contents=  preg_replace('/\<\!\-\- else(.*) \-\-\>/','<?php else:  ?>', $contents);
              $contents=  preg_replace('/\<\!\-\- endif \-\-\>/','<?php endif;?>', $contents);
            eval(' ?>'.$contents.'<?php ');
        }
        else{
            exit('<h2>Template Error</h2>');
        }
    }
}



?>