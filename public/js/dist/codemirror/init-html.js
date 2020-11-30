var editor = CodeMirror.fromTextArea(document.getElementById("workspace"), {
    mode: {
        name: "htmlmixed",
        scriptTypes: [{
            matches: /\/x-handlebars-template|\/x-mustache/i,
            mode: null
        }, {
            matches: /(text|application)\/(x-)?vb(a|script)/i,
            mode: "vbscript"
        }]
    },
    lint: !0,
    styleActiveLine: !0,
    lineNumbers: !0,
    lineWrapping: !0,
    autoCloseTags: !0,
    gutters: ["CodeMirror-lint-markers", "CodeMirror-linenumbers", "CodeMirror-foldgutter"],
    extraKeys: {
        "Alt-F": "findPersistent",
        "Ctrl-J": "toMatchingTag",
        "Alt-G": "Find",
        "Ctrl-Space": "autocomplete"
    },
    value: document.documentElement.innerHTML,
    matchTags: {
        bothTags: !0
    },
    foldGutter: !0,
    scrollbarStyle: "simple",
    tabSize: 2,
    showCursorWhenSelecting: !0,
    theme: "codium-dark",
    autoCloseBrackets: true,
    showTrailingSpace: true
});


function completeAfter(e, t) {
    e.getCursor();
    return t && !t() || setTimeout(function () {
        e.state.completionActive || e.showHint({
            completeSingle: !1
        });
    }, 100), CodeMirror.Pass;
}

function updatePreview() {
    var e = document.getElementById("preview"),
        t = e.contentDocument || e.contentWindow.document;
    t.open();
    var i = editor.getValue();
    t.write(i), t.close();
    var n = String(editor.getValue().replace(/\n/gi, " ").match(/<title>\s?.{1,}?\s?<\/title>/gi)).replace(/<title>/gi, "").replace(/<\/title>/gi, "").replace(/</gi, "&lt;").replace(/</gi, "&gt;").replace(/\n/gi, ""),
        r = String(editor.getValue().replace(/\n/gi, "").replace(/\"/gi, "").replace(/\'/gi, "").replace(/\s/gi, "").match(/<link(rel=iconhref=.{1,}?>|href=.{1,}?rel=icon)/gi)).replace(/<link/gi, "").replace(/rel=icon/gi, "").replace(/href=/gi, "").replace(/>/gi, "");
    null != n && (titleOut.innerHTML = n), "null" == n && (titleOut.innerHTML = "localhost"), null != r && (iconOut.innerHTML = "<img src='" + r + "'>"), "null" == r && (iconOut.innerHTML = "");
}

function beautify() {
    if (!the.beautify_in_progress) {
        the.beautify_in_progress = !0;
        var e, t = the.editorBoolean ? the.editorBoolean.getValue() : $("#workspace").val(),
            i = {
                indent_size: 4
            };
        i.indent_char = 1 == i.indent_size ? "\t" : " ", i.max_preserve_newlines = 5, i.preserve_newlines = "-1" !== i.max_preserve_newlines, i.keep_array_indentation = !0, i.break_chained_methods = !0, i.indent_scripts = "normal", i.brace_style = "end-expand", i.space_before_conditional = !0, i.unescape_strings = !1, i.jslint_happy = !0, i.end_with_newline = !0, i.wrap_line_length = 0, e = html_beautify(t, i), the.editorBoolean.setValue(e), the.beautify_in_progress = !1;
    }
}
var titleOut = $(".page-info .tab .text")[0],
    iconOut = $(".page-info .tab .icon")[0],
    the = {
        beautify_in_progress: !1,
        editorBoolean: editor
    };

$(document).ready(function () {
    $(window).resize(function () {
        menu.noticeCursor();
        docs.noticeCursor();
    });
    $('.run').click(function () {
        updatePreview();
    });
    $('.docs .head').click(function () {
        $('.docs .container').focus();
    });
    $(window).bind("keydown", function (e) {
        if (e.ctrlKey && 13 == e.keyCode) {
            beautify();
        }
        if (e.altKey && 13 == e.keyCode) {
            updatePreview();
        }
    });
    var hrefData = window.location.search;

    if (hrefData.match(/\?lesson\=(?=\d\d)/gi) || hrefData.match(/\&lesson\=(?=\d\d)/gi)) {
        console.log(1212);
    }
    $('.beautify-btn').click(function () {
        beautify();
    });
    var menu = $('.menu').niceScroll({
        mousescrollstep: 7,
        cursorcolor: "#F2F3F5",
        cursorwidth: "3px",
        cursorborderradius: "3px",
        cursorborder: "none",
        zindex: 10000,
        cursoropacitymin: 1
    });
    var docs = $('.docs .container').niceScroll({
        mousescrollstep: 7,
        cursorcolor: "#3C3F50",
        cursorwidth: "8px",
        cursorborderradius: "8px",
        cursorborder: "none",
        zindex: 10000,
        cursoropacitymin: 1,
        railpadding: {
            right: 7,
            bottom: 7
        }
    });
    $('.sections').resize({
        axis: "x"
    });
    setTimeout(function () {
        $('.preview .loader').css('animation', 'none'); $('.preview .loader').animate({ opacity: 0 }, 300);
    }, 300);
    updatePreview();
});
