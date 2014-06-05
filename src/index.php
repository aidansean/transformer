<?php
$title = 'Transforming images' ;
$stylesheets = array('style.css') ;
include($_SERVER['FILE_PREFIX'] . '/_core/preamble.php') ;
?>
  <div class="right">
    <h3>Image transformer</h3>
    <div class="blurb">
      <p>This page shows some transformed images.  The transformation takes a rectangular image and changes it into polar coordinates.</p>
    </div>
  </div>
  
  <div class="right">
    <h3>Gallery</h3>
    <div class="blurb">
      <p>Here are some "before" and "after" images of the transformer at work!</p>
      <?php make_gallery_table('Trees'             , 'trees'          ) ; ?>
      <?php make_gallery_table('Sunset'            , 'sunset'         ) ; ?>
      <?php make_gallery_table('Lightning'         , 'lightning'      ) ; ?>
      <?php make_gallery_table('Lake'              , 'lake'           ) ; ?>
      <?php make_gallery_table('Bruges'            , 'bruges'         ) ; ?>
      <?php make_gallery_table('Los Angeles'       , 'la'             ) ; ?>
      <?php make_gallery_table('HMS Belfast'       , 'HMSBelfast'     ) ; ?>
      <?php make_gallery_table('Stonehenge'        , 'stonehenge'     ) ; ?>
      <?php make_gallery_table('Southwark Bridge'  , 'southwarkBridge') ; ?>
      <?php make_gallery_table('San Diego'         , 'sanDiego'       ) ; ?>
      <?php make_gallery_table('London'            , 'london'         ) ; ?>
      <?php make_gallery_table('Palm trees'        , 'palms'          ) ; ?>
      <?php make_gallery_table('Giraffes'          , 'giraffes'       ) ; ?>
      <?php make_gallery_table('Angel of the North', 'angel'          ) ; ?>
    </div>
  </div>
  
  <div class="right">
    <h3>The transformation</h3>
    <div class="blurb">
      <p>The transformation is actually a little more complicated than you might expect.  Each pixel in the target image is mapped to a pixel from the source image according to:</p>
      \[
        X = w \arctan\left(\frac{\sqrt{2}x-h}{\sqrt{2}y-h}\right)
      \]
      \[
        Y = \frac{h-\sqrt{(\sqrt{2}x-h)^2+(\sqrt{2}y-h)^2}}{h}\arctan\left(\frac{\sqrt{2}x-h}{\sqrt{2}y-h}\right)
      \]
      <p>where \((X,Y)\) is the coordinate in the source image, \((x,y)\) is the coordinate in the target image and \(w\) and \(h\) are the width and height of the source image.  Here is what the transformation looks like when applied to rectangular coordinates:</p>
      <?php make_gallery_table('Grid', 'grid') ; ?>
    </div>
  </div>

<?php

foot.php() ;

function make_gallery_table($title, $name){
  echo '      <hr style="border-top:1px solid black"/>' , PHP_EOL ;
  echo '      <table class="gallery">' , PHP_EOL ;
  echo '        <tbody>' , PHP_EOL ;
  echo '          <tr>' , PHP_EOL ;
  echo '            <td class="gallery_before">Before</td>' , PHP_EOL ;
  echo '            <td class="gallery_after">After</td>' , PHP_EOL ;
  echo '          </tr>' , PHP_EOL ;
  echo '          <tr>' , PHP_EOL ;
  echo '            <td class="gallery_before">' , PHP_EOL ;
  echo '              <a href="gallery/' , $name , '_before.png"><img src="gallery/thumbnails/' , $name , '_before.png" width="350px" alt="' , $title , ' before"/></a>' , PHP_EOL ;
  echo '            </td>' , PHP_EOL ;
  echo '            <td class="gallery_after">' , PHP_EOL ;
  echo '              <a href="gallery/' , $name , '_after.png"><img src="gallery/thumbnails/' , $name , '_after.png" width="350px" height="350px" alt="' , $title , 'before"/></a>' , PHP_EOL ;
  echo '            </td>' , PHP_EOL ;
  echo '          </tr>' , PHP_EOL ;
  echo '        </tbody>' , PHP_EOL ;
  echo '      </table>' , PHP_EOL ;
}

?>