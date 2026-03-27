var textarea = $("#content");

console.log("heloo");
var editor = ace.edit("editor");
editor.setTheme("ace/theme/tomorrow");

editor.getSession().on("change", function () {
    textarea.val(editor.getSession().getValue());
});

textarea.val(editor.getSession().getValue());
