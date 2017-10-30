<?php
include_once 'konfiguracija.php';
?>

<!-- some CSS styling changes and overrides -->
<style>
.kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar .file-input {
    display: table-cell;
    max-width: 220px;
}
</style>
 
<!-- the avatar markup -->
<div id="kv-avatar-errors-2" class="center-block" style="width:800px;display:none"></div>
<form class="text-center" action="/avatar_upload.php" method="post" enctype="multipart/form-data">
    <div class="kv-avatar center-block" style="width:200px">
        <input id="avatar-2" name="avatar-2" type="file" class="file-loading">
    </div>
    <!-- include other inputs if needed and include a form submit (save) button -->
</form>
<!-- your server code `avatar_upload.php` will receive `$_FILES['avatar']` on form submission -->
 
<!-- the fileinput plugin initialization -->
<script>
var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' + 
    'onclick="alert(\'Call your custom code here.\')">' +
    '<i class="glyphicon glyphicon-tag"></i>' +
    '</button>'; 
$("#avatar-2").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    showBrowse: false,
    browseOnZoneClick: true,
    removeLabel: '',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-2',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar" style="width:160px"><h6 class="text-muted">Click to select</h6>',
    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
});

<input id="input-711" name="kartik-input-711[]" type="file" multiple class="file-loading">
<script>
$("#input-711").fileinput({
    uploadUrl: "http://localhost/file-upload-single/1", // server upload action
    uploadAsync: true,
    maxFileCount: 5,
    showBrowse: false,
    browseOnZoneClick: true
});
</script>
</script>