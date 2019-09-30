
var melisPlatformFrameworkLumenDemoTool = {

    saveAlbumData : function( data,callback){
        if (typeof(callback)==='undefined') callback = null;
        $.ajax({
            type        : 'POST',
            url         : '/melis/save-lumen-album',
            data        : data,
            dataType    : 'json',
            encode		: true
        }).done(function(data){
            if(data.success) {
                //toolProspects.refreshTable();
               // $(".modal").modal("hide");
              // melisCoreTool.resetLabels("#idformprospectdata");
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
    getAddAlbumForm : function (targetDiv) {
        var url = "/melis/lumen-get-album-form";

    }
    
};

(function ($){

    var bodyLumen = $('body');
    var modalUrlLumen = '/melis/MelisPlatformFrameworkLumenDemoTool/LumenDemoTool/render-lumen-album-modal';
    var zoneIdLumen = 'melis_platform_framework_lumen_demo_tool_modal_content';
    var melisKey = 'melis_platform_framework_lumen_demo_tool_modal_content';

    bodyLumen.on('click', ".add-lumen-album", function(){
        melisHelper.createModal(zoneIdLumen,melisKey,true,[],modalUrlLumen)
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
    /**
     * refresh the whole table
     */
    bodyLumen.on('click',".melis-lumen-refresh" ,function(){
        melisHelper.zoneReload('id_melis_platform_framework_lumen_demo_tool', 'melis_platform_framework_lumen_demo_tool')
    });


})(jQuery);