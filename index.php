<?php 
header("Content-Type: text/xml;");
printf('<?xml version="1.0" ?>'); 
?>
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" output-encoding="UTF-8" title="Memory Game" xsi:noNamespaceSchemaLocation="http://www.netbiscuits.com/schema/netbiscuits-tactile.xsd">
    <external type="css" file="css/memorygame.css"/>
    <external type="script" file="js/memorygame.js"/>
    <layout id="root" class="root" width="100%" height="100%" top="0" left="0">
        <layout id="titlebar" class="titlebar" height="Math.round(parent.height*.1)" width="landscape:Math.round(parent.width*.35),portrait:Math.round(parent.width*.9)" top="landscape:Math.round(parent.height*.05),portrait:Math.round(parent.height*.025)" left="landscape:Math.round(parent.width*.025),portrait:Math.round(parent.width*.05)">
            <view id="titlebarview" class="titlebar" height="100%" width="100%" top="0" left="0">
            </view>
        </layout>
        <layout id="sidebar" class="sidebar" height="Math.round(parent.height*.71)" width="Math.round(parent.width*.35)" top="Math.round(parent.height*.17)" left="Math.round(parent.width*.025)" visible="landscape:true,portrait:false">
            <view id="sidebarview" class="sidebar" height="100%" width="100%" top="0" left="0">
            </view>
        </layout>
        <layout id="playfield" width="landscape:Math.round(parent.height*.9),portrait:Math.round(parent.width*.9)" height="landscape:Math.round(parent.height*.9),portrait:Math.round(parent.width*.9)" top="landscape:Math.round(parent.height * .05),portrait:Math.round(parent.height * .15)" left="landscape:Math.round(parent.width * .4),portrait:Math.round(parent.width * .05)">
            <gridview id="gridview" class="gamefield" gridflow="horizontal" width="100%" height="100%" top="0" left="0" opacity="100" zindex="1" items-height="(parent.height - 25) * .25" items-width="(parent.height - 25) * .25" items-hgap="5" items-vgap="5">
                <?php
                    for ($n = 1; $n < 17; $n++) {
                ?>
                <item id="item<?php echo($n); ?>" class="photoback" ontap="#memorygame.photoTapped('photogrid<?php echo($n); ?>')">
                    <view id="photogrid<?php echo($n); ?>" class="loadingmask" width="100%" height="100%" display="none">
                        <IMAGE id="photo<?php echo($n); ?>">
                            <img src="images/pixel.jpg" altsrc="images/GAMEPIECE" format="jpg"/>
                        </IMAGE>
                    </view>
                </item>
                <?php 
                    }
                ?>
            </gridview>
        </layout>
        <layout id="footerbar" class="footerbar" height="Math.round(parent.height*.05)" width="landscape:Math.round(parent.width*.35),portrait:Math.round(parent.width*.9)" top="landscape:Math.round(parent.height*.9),portrait:Math.round(parent.height*.92)" left="landscape:Math.round(parent.width*.025),portrait:Math.round(parent.width * .05)">
            <view id="footerbarview" class="footerbar" height="100%" width="100%" top="0" left="0">
            </view>
        </layout>
        <layout id="maskinglayer" class="maskinglayer" height="parent.height" width="parent.width" zindex="1000" opacity="50" display="none">
        </layout>
        <layout id="gameover" class="gameover" height="60%" width="80%" top="Math.round(parent.height*.2)" left="Math.round(parent.width*.1)" display="none" zindex="2000" effect-type="slide" effect-duration="3000" effect-transition="easeInOut">
            <view id="gameoverview" class="gameover" height="100%" width="100%" ontap="#memorygame.gameOverTapped()">
                <TEXT>
                    <styles><style name="color" value="#000000"/></styles>
                    <richtext>[br][b]Congratulations: You Won![/b][p]Tap here to play another game.[/p]</richtext>
                </TEXT>
            </view>
        </layout>
    </layout>
</page>