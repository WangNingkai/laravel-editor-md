<?php

/**
 * editor.md 配置选项，请查阅官网：https://pandao.github.io/editor.md/ 了解具体设置项
 * 这里只列出一些比较重要的可配置项
 * 请注意，这里的配置项值必须为字符串型的 `ture` 或 `false`
 */
return [
    'width'=>'100%', //宽度百分比建议100%
    'height'=>'640',//高度px
    'emoji' => 'true',  //emoji表情
    'toc' => 'true',  //目录
    'tocm' => 'false',  //目录下拉菜单
    'taskList' => 'true',  //任务列表
    'flowChart' => 'false',  //流程图
    'tex' => 'false',  //开启科学公式TeX语言支持，默认关闭
    'imageUpload' => 'true',  //图片上传支持
    'saveHTMLToTextarea' => 'true',  //保存 HTML 到 Textarea
    'codeFold' => 'true',  //代码折叠
    'sequenceDiagram' => 'false',  //开启时序/序列图支持，默认关闭
    'addTextWater' => true, //开启文字图片水印 !!bool类型
    'textWaterColor' => '#0B94C1', //文字图片水印颜色
    'textWaterContent' => 'lablog', //文字图片水印内容
    'example' => true //是否开启示范路由 !!bool类型
];
