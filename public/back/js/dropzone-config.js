Dropzone.options.myAwesomeDropzone = {
    parallelUploads: 1,
    addRemoveLinks: true,
    addEditLink: true,
    autoProcessQueue: true,
    dictRemoveFile: '',
    dictFileTooBig: 'Image is larger than 16MB',
    timeout: 90000,
    maxFilesize: 100,
    renameFile: function (file) {
        name = new Date().getTime() + Math.floor((Math.random() * 100) + 1) + '_' + file.name;
        return name;
    },
    acceptedFiles: ".mp4,.mkv,.avi",
    success: function (file, response) {
        $('#video_id').val(response.videoDetails.id);
        $('#video_edit_id').val(response.videoDetails.id);
        $('.video_file').attr('src', response.url);
        $('.video-uploaded').show();
        $('input[name="title_en"]').val('');
        $('input[name="title_tr"]').val('');

    },
    processing: function(file, progress, bytesSent) {

    }
};
