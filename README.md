# editor.md for Laravel

>  `editor.md` 是一款高度可定制化的 `markdown` 编辑器，官方网站：https://pandao.github.io/editor.md/ 。

  `laravel-editor-md` 是基于editor.md改造适配Laravel的 `markdown` 编辑器，修改自https://github.com/douyasi/laravel-editor-md

## 兼容版本

本扩展包经过测试，适配 `Laravel 5.1` 以上稳定版本（`5.0` 版本理论上也是可行的，但未经测试）。

>   特别说明：
>   `composer` 分析某些依赖时可能会出现问题：比如在 `Laravel 5.2` 主项目中，安装本扩展包，可能会装上 `5.3` 版本的 `illuminate/support` 与 `illuminate/contracts` 相关依赖包，这样可能会造成 `5.2` 主项目出现错误。为此，本包在 `composer.json` 特别移除对 `"illuminate/support": "~5.1"` 的依赖。

## 安装与配置

```
composer require wangningkai/laravel-editor-md

```

依赖安装完毕之后，在 `app.php` 中添加：

```php
'providers' => [
        WangNingkai\Editor\EditorServiceProvider::class,
        Intervention\Image\ImageServiceProvider::class,
],
```

然后，执行下面 `artisan` 命令，发布扩展包配置等项。

```bash
php artisan vendor:publish --force
```

```

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

```

现在您可以访问 `/laravel-editor-md/example` 路由，不出意外，您可以看到扩展包提供的示例页面。

![](https://onedrive.imwnk.cn/%E5%9B%BE%E7%89%87%E7%BC%93%E5%AD%98/laravel-editor-md.jpg)

编辑器图片默认会上传到 `public/uploads/content` 目录下；编辑器相关功能配置位于 `config/editor.php` 文件中。

## 使用说明

在 `blade` 模版里面使用下面三个方法：`editor_css()` 、`editor_js()` 和 `editor_config()` 。

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>editor.md example</title>
    {!! editor_css() !!}
</head>
<body>
<h2>editor.md example</h2>
<div id="mdeditor">
  <textarea class="form-control" name="content" style="display:none;">
# editor.md for Laravel
>   editor.md example
  </textarea>
</div>

{!! editor_js() !!}
{!! editor_config('mdeditor') !!}
</body>
</html>
```

