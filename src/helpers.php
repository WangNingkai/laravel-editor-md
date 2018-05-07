<?php

use  Intervention\Image\Facades\Image;

if (!function_exists('format_json_message')) {
    /**
     * 格式化表单校验消息，并进行json数组化预处理
     *
     * @param  array $messages 未格式化之前数组
     * @param  array $json 原始json数组数据
     * @return array
     */
    function format_json_message($messages, $json)
    {
        $reasons = '';
        foreach ($messages->all(':message') as $message) {
            $reasons .= $message.' ';
        }
        $info = '失败原因为：'.$reasons;
        $json = array_replace($json, ['info' => $info]);
        return $json;
    }
}

if ( !function_exists('add_text_water') ) {
    /**
     * 给图片添加文字水印
     *
     * @param $file
     * @param $text
     * @param string $color
     * @return mixed
     */
    function add_text_water($file, $text, $color = '#0B94C1') {
        $image = Image::make($file);
        $image->text($text, $image->width()-20, $image->height()-30, function($font) use($color) {
                $font->file(public_path('vendor/editor.md/fonts/syh.ttf'));
                $font->size(20);
                $font->color($color);
                $font->align('right');
                $font->valign('bottom');
            });
        $image->save($file);
        return $image;
    }
}

/**
 * editor.md css 相关依赖
 * 
 * @return string
 */
function editor_css()
{

    return '<!--editor.md css-->
<link rel="stylesheet" href="/vendor/editor.md/css/editormd.preview.min.css" />
<link rel="stylesheet" href="/vendor/editor.md/css/editormd.min.css" />
<style type="text/css">
.editormd-fullscreen {
    z-index: 2147483647;
}
</style>';

}

/**
 * editor.md js 相关依赖
 * 实际上，editor.md 某些功能组件（如`flowChart`）置 false，可减少对应的js依赖，但为了安全起见还是将所有可能的js依赖列出。
 * 
 * @return string
 */
function editor_js()
{

    return '<!--editor.md js-->
<script type="text/javascript">
    window.jQuery || document.write(unescape("%3Cscript%20type%3D%22text/javascript%22%20src%3D%22//cdn.bootcss.com/jquery/2.2.4/jquery.min.js%22%3E%3C/script%3E"));
</script>
<script src="/vendor/editor.md/lib/marked.min.js"></script>
<script src="/vendor/editor.md/lib/prettify.min.js"></script>
<script src="/vendor/editor.md/lib/raphael.min.js"></script>
<script src="/vendor/editor.md/lib/underscore.min.js"></script>
<script src="/vendor/editor.md/lib/sequence-diagram.min.js"></script>
<script src="/vendor/editor.md/lib/flowchart.min.js"></script>
<script src="/vendor/editor.md/lib/jquery.flowchart.min.js"></script>
<script src="/vendor/editor.md/js/editormd.min.js"></script>';

}

/**
 * editor.md 初始化配置js代码
 * 
 * @param  string $editor_id 编辑器 `textarea` 所在父div层id值，默认取 `mdeditor` 字符串
 * @return string
 */
function editor_config($editor_id = 'mdeditor')
{

    return '<!--editor.md config-->
<script type="text/javascript">
var _'.$editor_id.';
$(function() {
    //修正emoji图片错误
    editormd.emoji     = {
        path  : "//staticfile.qnssl.com/emoji-cheat-sheet/1.0.0/",
        ext   : ".png"
    };
    _'.$editor_id.' = editormd({
            id : "'.$editor_id.'",
            width : "'.config('editor.width').'",
            height : '.config('editor.height').',
            saveHTMLToTextarea : '.config('editor.saveHTMLToTextarea').',
            emoji : '.config('editor.emoji').',
            taskList : '.config('editor.taskList').',
            tex : '.config('editor.tex').',
            toc : '.config('editor.toc').',
            tocm : '.config('editor.tocm').',
            codeFold : '.config('editor.codeFold').',
            flowChart: '.config('editor.flowChart').',
            sequenceDiagram: '.config('editor.sequenceDiagram').',
            path : "/vendor/editor.md/lib/",
            imageUpload : '.config('editor.imageUpload').',
            imageFormats : ["jpg", "gif", "png"],
            imageUploadURL : "/laravel-editor-md/upload/picture?_token='.csrf_token().'&from=laravel-editor-md"
    });
});
</script>';

}
