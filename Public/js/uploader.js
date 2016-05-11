var uploader = WebUploader.create({
    // 选完文件后，是否自动上传。
    auto        :true,
    // swf文件路径
    swf         :'/Public/plugins/webuploader/Uploader.swf',
    // 文件接收服务端。
    server      :'/Admin/Slider/fileupload',
    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick        :'#filePicker',
    fileNumLimit:1,
    compress :false,
    // 只允许选择图片文件。
    accept      :{
        title     :'Images',
        extensions:'gif,jpg,jpeg,bmp,png',
        mimeTypes :'image/*'
    }
});

console.log(uploader);
// 当有文件添加进来的时候
uploader.on('fileQueued',function(file){
    var $li = $(
            '<div id="' + file.id + '" class="file-item thumbnail1">' +
            '<img>' +
            '</div>'
        ),
        $img = $li.find('img');
    // $list为容器jQuery实例
    $("#fileList").append($li);
    $("#filePicker").remove();
    // 创建缩略图
    // 如果为非图片文件，可以不用调用此方法。
    // thumbnailWidth x thumbnailHeight 为 100 x 100
    uploader.makeThumb(file,function(error,src){
        if(error){
            $img.replaceWith('<span>不能预览</span>');
            return;
        }
        $img.attr('src',src);
    },200,200);
});
// 文件上传成功，给item添加成功class, 用样式标记上传成功。
uploader.on('uploadSuccess',function(file,e){
    var object = JSON.parse(e._raw);
    var imgUrl = object.imgUrl;
    $("#imgurl").val(imgUrl);
    $("#imgDiv").remove();
});
