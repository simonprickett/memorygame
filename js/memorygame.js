var memorygame = {
    lastTappedItemIndex: -1,
    imageToHide1: null,
    imageToHide2: null,
    imageArray: ["image1.jpg", "image2.jpg", "image3.jpg", "image4.jpg", "image5.jpg", "image6.jpg", "image7.jpg", "image8.jpg", "image1.jpg", "image2.jpg", "image3.jpg", "image4.jpg", "image5.jpg", "image6.jpg", "image7.jpg", "image8.jpg"],
    pairsMatched: 0,
    
    init: function() {
        memorygame.newGame();
    },

    photoTapped: function(itemId) {
        var tappedItem = tactile.page.getComponent(itemId);       
        if (! tappedItem.isVisible()) {
            if (memorygame.imageToHide1 != null) {
                memorygame.imageToHide1.hide();
            }
            if (memorygame.imageToHide2 != null) {
                memorygame.imageToHide2.hide();
            }
            
            var tappedItemIndex = itemId.replace("photogrid", "");
            tappedItem.show();

            if (memorygame.lastTappedItemIndex == -1) {
                memorygame.lastTappedItemIndex = tappedItemIndex;
            } else {
                if (memorygame.imageArray[tappedItemIndex - 1] == memorygame.imageArray[memorygame.lastTappedItemIndex - 1]) {
                    memorygame.imageToHide1 = null;
                    memorygame.imageToHide2 = null;
                    memorygame.pairsMatched = memorygame.pairsMatched + 1;
                    
                    if (memorygame.pairsMatched == 8) {
                        tactile.page.getComponent('maskinglayer').show();
                        tactile.page.getComponent('gameover').show();
                        //tactile.page.getComponent('gameoverview').show();
                    }
                } else {
                    memorygame.imageToHide1 = tappedItem;
                    memorygame.imageToHide2 = tactile.page.getComponent("photogrid" + memorygame.lastTappedItemIndex);
                }
                memorygame.lastTappedItemIndex = -1;	
            }
        }
    },
    
    newGame : function() {
        memorygame.imageArray.sort(function() { return 0.5 - Math.random()});
        
        for (n = 0; n < 16; n++) {
            var photo = tactile.page.getComponent("photo" + (n+1));
            photo.elem.innerHTML = photo.elem.innerHTML.replace("GAMEPIECE", memorygame.imageArray[n]);
        }
        
        tactile.foundation.ImageScaler.run();
    },
    
    gameOverTapped : function() {
        window.location.href = window.location.href;
    }
}

tactile.page.onready(memorygame.init);