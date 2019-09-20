
var melisPlatformFrameworkLumenDemoTool = {
    staticModal : "",
    saveAlbumData : function( data){
        console.log(data);
    },
    getAddAlbumForm : function (targetDiv) {
        var url = "/melis/lumen-get-album-form";
    }
    
};

(function ($){

    body.on('click', ".add-lumen-album", function(){

        melisPlatformFrameworkLumenDemoTool.getAddAlbumForm();
    });

})(jQuery);