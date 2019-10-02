
var melisPlatformFrameworkLumenDemoTool = {

    saveAlbumData : function(data,callback){
        if (typeof(callback)==='undefined') callback = null;
        $.ajax({
            type        : 'POST',
            url         : '/melis/save-lumen-album',
            data        : data,
            dataType    : 'json',
            encode		: true
        }).done(function(data){
            if(data.success) {
                if(typeof callback !== "undefined" && typeof callback === "function") {
                    callback();
                }
                $('.melis-lumen-refresh').trigger('click');
               melisHelper.melisOkNotification(data.textTitle, data.textMessage);
            }
            else
            {
                melisCoreTool.alertDanger("#prospectupdateformalert", '', data.textMessage);
                melisHelper.melisKoNotification(data.textTitle, data.textMessage, data.errors, 0);
                melisCoreTool.highlightErrors(data.success, data.errors, "lumen_demo_tool_add_album");
            }
            melisCore.flashMessenger();
            melisCoreTool.done("#btnProspectUpdate");
        });
    },
    deleteAlbum : function(id, callback){
        if (typeof(callback) ==='undefined') callback = null;
        $.ajax({
            type        : 'POST',
            url         : '/melis/delete-lumen-album',
            data        : { albumId : id},
            dataType    : 'json',
            encode		: true
        }).done(function(data){
            if(data.success) {
                if(typeof callback !== "undefined" && typeof callback === "function") {
                    callback();
                }
                $('.melis-lumen-refresh').trigger('click');
                melisHelper.melisOkNotification(data.textTitle, data.textMessage);
            }
            else
            {
                melisCoreTool.alertDanger("#prospectupdateformalert", '', data.textMessage);
                melisHelper.melisKoNotification(data.textTitle, data.textMessage, data.errors, 0);
                melisCoreTool.highlightErrors(data.success, data.errors, "idformprospectdata");
            }
            melisCore.flashMessenger();
            melisCoreTool.done("#btnProspectUpdate");
        });
    },
    
};

(function ($){

    var bodyLumen = $('body');
    var modalUrlLumen = '/melis/MelisPlatformFrameworkLumenDemoTool/LumenDemoTool/render-lumen-album-modal';
    var zoneIdLumen = 'melis_platform_framework_lumen_demo_tool_modal_content';
    var melisKey = 'melis_platform_framework_lumen_demo_tool_modal_content';

    bodyLumen.on('click', ".add-lumen-album", function(){
        melisHelper.createModal(zoneIdLumen,melisKey,true,[],modalUrlLumen)
    });
    bodyLumen.on('click', ".btnEditLumenAlbum", function(){
        var id = $(this).data('id');
        melisHelper.createModal(zoneIdLumen,melisKey,true,{albumId : id},modalUrlLumen)
    });
    /*
     * submit form
     */
    bodyLumen.on('submit',"#lumen_demo_tool_add_album",function(e){
        e.preventDefault();
        var formData = $(this).serializeArray();
        melisPlatformFrameworkLumenDemoTool.saveAlbumData(formData,function(){
            $(".lumen-modal-close").trigger('click')
        });
    });

    bodyLumen.on('click', ".btnDelLumenAlbum", function(){
        var id = $(this).data('id');
        melisCoreTool.confirm(
            translations.tr_meliscore_common_yes,
            translations.tr_meliscore_common_no,
            "Album",
            "Are you sure you want to delete this album ?",
            function () {
                melisPlatformFrameworkLumenDemoTool.deleteAlbum(id)
            }
        );
    });

    /**
     * refresh the whole area
     */
    bodyLumen.on('click',".melis-lumen-refresh" ,function(){
        melisHelper.zoneReload('id_melis_platform_framework_lumen_demo_tool', 'melis_platform_framework_lumen_demo_tool')
    });

})(jQuery);