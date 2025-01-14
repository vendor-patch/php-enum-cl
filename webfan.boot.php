<?php

( function($get0, $get74, $get80, bool $once = true){   			
	if (true === $once && in_array(__FILE__, get_included_files())) { 
		throw new \LogicException('Attempt to invoke bootstrap file more than once: %s', __FILE__);
	}	
	
 $phpVersion = \PHP_VERSION_ID;
 $usePolytill = $phpVersion< 80000 ? true : false;
 $slug = true === $usePolytill ? '74' : '80';

 $Map =  match($usePolytill){
		       true === $usePolytill    =>    $get74(),
		       false === $usePolytill    =>    $get80(),
		       default =>  $get74(),
        }

$classMap =  array_merge($get0($slug), $Map);	

 $loader =  \frdl\implementation\psr4\RemoteAutoloaderApiClient::getInstance('https://webfan.de/install/latest/?source={{class}}&salt={{salt}}', true)  ;
	
( function($classMap, $loader){   
	$dir = dirname($loader->file('Foo'));
        $loader->withClassmap( $classMap );
          	 
	$loader->withBeforeMiddleware(function($class, &$loader){
	       switch($class){
		      case 'Mabe\Enum\\' === substr($class, 0, strlen('Mabe\Enum\\') ) 
			      ||  'frdl\Enum\\' === substr($class, 0, strlen('frdl\Enum\\') ) 
			      :   
			       $aDir = dirname($dir).\DIRECTORY_SEPARATOR.'autoload-files-conditional'.\DIRECTORY_SEPARATOR.'php-enum-cl';
			       if(!is_dir($aDir)){
				  mkdir($aDir, 0775, true);       
			       }
			       $aFile = $aDir.\DIRECTORY_SEPARATOR.'functions.php';
			       if(!file_exists($aFile)){
				  file_put_contents($aFile,
				     file_get_contents('https://raw.githubusercontent.com/vendor-patch/php-enum-cl/main/src/functions.php'));     
			       }   
		
			       if (!in_array($aFile, get_included_files())) {
			           require_once $aFile;
			       }
			       
			       return true;
			   break;
		       default:
			    return true;
			  break;
	       }
	   
	    /*   return true;  return false to skip this autoloader, return any/VOID to continue */
          });     
 } )(
  $classMap,
  $loader
);   
  
  
  
   } )(

  /*$get0*/   
  function($slug){
    return [
     \Mabe\Enum\Cl\BackedEnum::class => sprintf('https://raw.githubusercontent.com/vendor-patch/php-enum-cl/main/src/php%s/BackedEnum.php?cache_bust=${salt}', $slug),
     \Mabe\Enum\Cl\EmulatedIntEnum::class => sprintf('https://raw.githubusercontent.com/vendor-patch/php-enum-cl/main/src/php%s/EmulatedIntEnum.php?cache_bust=${salt}', $slug),
     \Mabe\Enum\Cl\EmulatedStringEnum::class => sprintf('https://raw.githubusercontent.com/vendor-patch/php-enum-cl/main/src/php%s/EmulatedStringEnum.php?cache_bust=${salt}', $slug),
	    'Mabe\Enum\Cl\\' => 'https://raw.githubusercontent.com/vendor-patch/php-enum-cl/main/src/psr-4/${class}.php?cache_bust=${salt}',
	    \UnitEnum::class => 'https://raw.githubusercontent.com/vendor-patch/php-enum-cl/main/src/stubs/UnitEnum.php?cache_bust=${salt}', 
            \ValueError::class=>'https://raw.githubusercontent.com/vendor-patch/php-enum-cl/main/src/stubs/ValueError.php?cache_bust=${salt}',
      ];
  },	
	
  /*$get74*/
  function(){
    return [
      
      ];
  },

  /*$get80*/
  function(){
    return [
      
      ];
  }  
);   
