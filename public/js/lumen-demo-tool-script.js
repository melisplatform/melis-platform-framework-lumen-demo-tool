
var melisPlatformFrameworkLumenDemoTool = {
    tempLoader    : "<div id=\"loader\" class=\"overlay-loader\"><img class=\"loader-icon spinning-cog\" src=\"/MelisCore/assets/images/cog12.svg\" data-cog=\"cog12\"></div>",
    currentRequest : null,
    refreshTool   : function(){
        melisHelper.zoneReload('id_melis_platform_framework_lumen_demo_tool', 'melis_platform_framework_lumen_demo_tool')
    },
    refreshTable : function() {
        var targetTable = $("#lumenDemoToolTable");
        // append loader
        $("#lumenDemoToolTable_wrapper").append(melisPlatformFrameworkLumenDemoTool.tempLoader);
        targetTable.DataTable().ajax.reload(function(){
            $("#lumenDemoToolTable_wrapper").find("#loader").remove();
        });
    },
    getToolModal : function(callback, id){
        if (typeof(callback) ==='undefined') callback = null;
        var data = "";
        melisPlatformFrameworkLumenDemoTool.currentRequest =  $.ajax({
            type: 'GET',
            url: '/melis/get-tool-modal',
            data : {
                albumId : id
            },
        }).done(function (returnData) {

            if(typeof callback !== "undefined" && typeof callback === "function") {
                callback(returnData);
            }

            data = returnData;
        });

        return data;
    },
    getAlbumById : function(id) {
        $.ajax({
            type: 'GET',
            url: '/melis/get-lumen-data/'+ id,
            dataType: 'json',
            encode: true
        }).done(function (data) {
            console.log(data);
        });
    },
    saveAlbumData : function(data,callback,callbackFail){
        if (typeof(callback) ==='undefined') callback = null;
        if (typeof(callbackFail) ==='undefined') callbackFail = null;

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
               melisHelper.melisOkNotification(data.textTitle, data.textMessage);
            }
            else
            {
                melisCoreTool.alertDanger("#prospectupdateformalert", '', data.textMessage);
                melisHelper.melisKoNotification(data.textTitle, data.textMessage, data.errors, 0);
                melisCoreTool.highlightErrors(data.success, data.errors, "lumen_demo_tool_add_album");
                if(typeof callbackFail !== "undefined" && typeof callbackFail === "function") {
                    callbackFail();
                }
            }
            melisCore.flashMessenger();

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

    bodyLumen.on('click', ".btnEditLumenAlbum", function(){
        var id = $(this).parent().parent().attr('id');
        // append loader
        $(".modal-dynamic-content").html(melisPlatformFrameworkLumenDemoTool.tempLoader);
        // get the configured form
        melisPlatformFrameworkLumenDemoTool.getToolModal(function(data){
            $(".modal-dynamic-content").html(data);
        },id);
    });
    bodyLumen.on('click', '#btn-save-lumen-album', function(){
        $("#lumen_demo_tool_add_album").submit();
    });
    /*
     * submit form
     */
    bodyLumen.on('submit',"#lumen_demo_tool_add_album",function(e){
        e.preventDefault();
        var saveBtn = $("#btn-save-lumen-album");
        saveBtn.attr('disabled','disabled');
        var formData = $(this).serializeArray();
        melisPlatformFrameworkLumenDemoTool.saveAlbumData(formData,function(){
            $(".lumen-modal-close").trigger('click');
            // reload the tool
            melisPlatformFrameworkLumenDemoTool.refreshTool();
        },function(){
            saveBtn.removeAttr('disabled')
        });

    });
    /*
     * delete an album
     */
    bodyLumen.on('click', ".btnDelLumenAlbum", function(){
        var id = $(this).parent().parent().attr('id');
        melisCoreTool.confirm(
            translations.tr_meliscore_common_yes,
            translations.tr_meliscore_common_no,
            translations.tr_melis_lumen_notification_title_delete,
            translations.tr_melis_lumen_notification_message_delete_message,
            function () {
                // append loader
                melisPlatformFrameworkLumenDemoTool.deleteAlbum(id,function(){
                    // refresh tool
                    melisPlatformFrameworkLumenDemoTool.refreshTool();
                });
            }
        );
    });
    /*
     * refresh tool
     */
    bodyLumen.on('click', '.melis-lumen-refresh', function(){
        melisPlatformFrameworkLumenDemoTool.refreshTool();
    });
    bodyLumen.on('click', '.add-lumen-album', function(){
        // append loader
        $(".modal-dynamic-content").html(melisPlatformFrameworkLumenDemoTool.tempLoader);
        // get the configured form
        melisPlatformFrameworkLumenDemoTool.getToolModal(function(data){
            $(".modal-dynamic-content").html(data);
        });
    });
    /*
     * cancel ajax request when canceled
     */
    bodyLumen.on('hidden.bs.modal',"#lumenModal",function(){
        melisPlatformFrameworkLumenDemoTool.currentRequest.abort();
    });

})(jQuery);