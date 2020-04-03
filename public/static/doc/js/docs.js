// 代码高亮
hljs.initHighlightingOnLoad();

// 页面滚动
smoothScroll.init({
  speed: 300
});

// 图片占位符
Holder.addTheme("gray", {
  bg: "#BCBEC0",
  fg: "rgba(255, 255, 255, 1)",
  size: 12,
  fontweight: "normal"
});

// 示例处理
$$('.viewsource').on('click', function () {
  var $this = $$(this);
  $this.parents('.doc-example').eq(0).toggleClass('doc-example-showcode');
});


/**
 * 设置文档主题
 */
(function () {
  var DEFAULT_PRIMARY = 'indigo';
  var DEFAULT_ACCENT = 'pink';
  var DEFAULT_LAYOUT = '';

  // 设置 cookie
  var setCookie = function (key, value) {
    // cookie 有效期为 1 年
    var date = new Date();
    date.setTime(date.getTime() + 365*24*3600*1000);
    document.cookie = key + '=' + value + '; expires=' + date.toGMTString() + '; path=/';
  };

  var setDocsTheme = function (theme) {
    if (typeof theme.primary === 'undefined') {
      theme.primary = false;
    }
    if (typeof theme.accent === 'undefined') {
      theme.accent = false;
    }
    if (typeof theme.layout === 'undefined') {
      theme.layout = false;
    }

    var i, len;
    var $body = $$('body');

    var classStr = $body.attr('class');
    var classs = classStr.split(' ');

    // 设置主色
    if (theme.primary !== false) {
      for (i = 0, len = classs.length; i < len; i++) {
        if (classs[i].indexOf('mdui-theme-primary-') === 0) {
          $body.removeClass(classs[i])
        }
      }
      $body.addClass('mdui-theme-primary-' + theme.primary);
      setCookie('docs-theme-primary', theme.primary);
      $$('input[name="doc-theme-primary"][value="' + theme.primary + '"]').prop('checked', true);
    }

    // 设置强调色
    if (theme.accent !== false) {
      for (i = 0, len = classs.length; i < len; i++) {
        if (classs[i].indexOf('mdui-theme-accent-') === 0) {
          $body.removeClass(classs[i]);
        }
      }
      $body.addClass('mdui-theme-accent-' + theme.accent);
      setCookie('docs-theme-accent', theme.accent);
      $$('input[name="doc-theme-accent"][value="' + theme.accent + '"]').prop('checked', true);
    }

    // 设置主题色
    if (theme.layout !== false) {
      for (i = 0, len = classs.length; i < len; i++) {
        if (classs[i].indexOf('mdui-theme-layout-') === 0) {
          $body.removeClass(classs[i]);
        }
      }
      if (theme.layout !== '') {
        $body.addClass('mdui-theme-layout-' + theme.layout);
      }
      setCookie('docs-theme-layout', theme.layout);
      $$('input[name="doc-theme-layout"][value="' + theme.layout + '"]').prop('checked', true);
    }
  };

  // 切换主色
  $$(document).on('change', 'input[name="doc-theme-primary"]', function () {
    setDocsTheme({
      primary: $$(this).val()
    });
  });

  // 切换强调色
  $$(document).on('change', 'input[name="doc-theme-accent"]', function () {
    setDocsTheme({
      accent: $$(this).val()
    });
  });

  // 切换主题色
  $$(document).on('change', 'input[name="doc-theme-layout"]', function () {
    setDocsTheme({
      layout: $$(this).val()
    });
  });

  // 恢复默认主题
  $$(document).on('cancel.mdui.dialog', '#dialog-docs-theme', function () {
    setDocsTheme({
      primary: DEFAULT_PRIMARY,
      accent: DEFAULT_ACCENT,
      layout: DEFAULT_LAYOUT
    });
  });
})();

