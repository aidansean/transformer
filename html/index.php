<?php
$title = 'Transforming images' ;
$fb_image = 'http://www.aidansean.com/transformer/gallery/thumbnails/bruges_after.png' ;
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
    <div class="blurb">
      <p>Here are some "before" and "after" images of the transformer at work!</p>
      <?php
      make_gallery_table('Trees'               , 'trees'          ) ;
      make_gallery_table('Sunset'              , 'sunset'         ) ;
      make_gallery_table('Lightning'           , 'lightning'      ) ;
      make_gallery_table('Lake'                , 'lake'           ) ;
      make_gallery_table('Bruges'              , 'bruges'         ) ;
      make_gallery_table('Los Angeles'         , 'la'             ) ;
      make_gallery_table('HMS Belfast'         , 'HMSBelfast'     ) ;
      make_gallery_table('Stonehenge'          , 'stonehenge'     ) ;
      make_gallery_table('Southwark Bridge'    , 'southwarkBridge') ;
      make_gallery_table('San Diego'           , 'sanDiego'       ) ;
      make_gallery_table('London'              , 'london'         ) ;
      make_gallery_table('London'              , 'london2'        ) ;
      make_gallery_table('New Jersey'          , 'NYC'            ) ;
      make_gallery_table('Palm trees'          , 'palms'          ) ;
      make_gallery_table('Giraffes'            , 'giraffes'       ) ;
      make_gallery_table('Angel of the North'  , 'angel'          ) ;
      make_gallery_table('Botanique, Brussels' , 'BXL'            ) ;
      make_gallery_table('Lake Geneva'         , 'geneve'         ) ;
      make_gallery_table('M&Ms store, London'  , 'MMs'            ) ;
      make_gallery_table('Palace of Fine Arts' , 'Palace'         ) ;
      make_gallery_table('Belgrade church'     , 'church'         ) ;
      make_gallery_table('Trams'               , 'trams'          ) ;
      make_gallery_table('Rue Royale'          , 'SaintMarie'     ) ;
      make_gallery_table('Roof of Saint Marie' , 'church2'        ) ;
      make_gallery_table('Office building'     , 'building'       ) ;
      make_gallery_table('Saints'              , 'Saints'         ) ;
      make_gallery_table('St Pancras'          , 'StPancras'      ) ;
      make_gallery_table('Gallery'             , 'gallery'        ) ;
      make_gallery_table('Roof'                , 'roof'           ) ;
      make_gallery_table('CERN stairs'         , 'stairs'         ) ;
      make_gallery_table('Tangles'             , 'tangles'        ) ;
      make_gallery_table('Antwerp station'     , 'AntwerpStation1') ;
      make_gallery_table('Antwerp station'     , 'AntwerpStation2') ;
      ?>
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
      make_gallery_table('Grid', 'grid') ;
    </div>
  </div>

<?php

foot() ;

function make_gallery_table($title, $name){
  //echo '      <hr style="border-top:1px solid black"/>' , PHP_EOL ;
  echo '      <h3>' , $title , '</h3>' , PHP_EOL ;
  echo '      <table class="gallery">' , PHP_EOL ;
  echo '        <tbody>' , PHP_EOL ;
  echo '          <tr>' , PHP_EOL ;
  echo '            <td class="gallery_before gallery_text">Before</td>' , PHP_EOL ;
  echo '            <td class="gallery_after gallery_text">After</td>' , PHP_EOL ;
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