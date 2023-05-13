<?php
/*
if (PHP_VERSION_ID < 80000) {
    require_once __DIR__ . '/../php74/BackedEnum.php';
} else {
    require_once __DIR__ . '/../php80/BackedEnum.php';
}
*/
( function($get0, $get74, $get80){   

 $phpVersion = \PHP_VERSION_ID;
 $usePolytill = $phpVersion< 80000 ? true : false;
 $slug = true === $usePolytill ? '74' : '80';

 $Map =  match($usePolytill){
		       true === $usePolytill    =>    $get74(),
		       false === $usePolytill    =>    $get80(),
		       default =>  $get74(),
        }

$classMap =  array_merge($get0($slug), $Map);	
	
	
( function($classMap){   
     \frdl\implementation\psr4\RemoteAutoloaderApiClient::getInstance('https://webfan.de/install/latest/?source={{class}}&salt={{salt}}', true)       
            ->withClassmap( $classMap );
     
 } )(
  $classMap
);   
  
  
  
   } )(

  /*$get0*/   
  function($slug){
    return [
	    'Mabe\Enum\Cl\\' => sprintf('https://raw.githubusercontent.com/vendor-patch/php-enum-cl/main/src/php%s/${class}.php?cache_bust=${salt}', $slug),
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
