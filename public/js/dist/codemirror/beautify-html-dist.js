!function(){function E(t){return t.replace(/\s+$/g,"")}function s(t,e,i,n){var s,h,r,a,_,o,c,p,u,g,l;for(void 0!==(e=e||{}).wrap_line_length&&0!==parseInt(e.wrap_line_length,10)||void 0===e.max_char||0===parseInt(e.max_char,10)||(e.wrap_line_length=e.max_char),h=void 0!==e.indent_inner_html&&e.indent_inner_html,r=void 0===e.indent_size?4:parseInt(e.indent_size,10),a=void 0===e.indent_char?" ":e.indent_char,o=void 0===e.brace_style?"collapse":e.brace_style,_=0===parseInt(e.wrap_line_length,10)?32786:parseInt(e.wrap_line_length||250,10),c=e.unformatted||["a","span","img","bdo","em","strong","dfn","code","samp","kbd","var","cite","abbr","acronym","q","sub","sup","tt","i","b","big","small","u","s","strike","font","ins","del","pre","address","dt","h1","h2","h3","h4","h5","h6"],p=void 0===e.preserve_newlines||e.preserve_newlines,u=p?isNaN(parseInt(e.max_preserve_newlines,10))?32786:parseInt(e.max_preserve_newlines,10):0,g=void 0!==e.indent_handlebars&&e.indent_handlebars,l=void 0!==e.end_with_newline&&e.end_with_newline,(s=new function(){return this.pos=0,this.token="",this.current_mode="CONTENT",this.tags={parent:"parent1",parentcount:1,parent1:""},this.tag_type="",this.token_text=this.last_token=this.last_text=this.token_type="",this.newlines=0,this.indent_content=h,this.Utils={whitespace:"\n\r\t ".split(""),single_token:"br,input,link,meta,!doctype,basefont,base,area,hr,wbr,param,img,isindex,?xml,embed,?php,?,?=".split(","),extra_liners:"head,body,/html".split(","),in_array:function(t,e){for(var i=0;i<e.length;i++)if(t===e[i])return!0;return!1}},this.is_whitespace=function(t){for(;0<t.length;t++)if(!this.Utils.in_array(t.charAt(0),this.Utils.whitespace))return!1;return!0},this.traverse_whitespace=function(){var t="";if(t=this.input.charAt(this.pos),this.Utils.in_array(t,this.Utils.whitespace)){for(this.newlines=0;this.Utils.in_array(t,this.Utils.whitespace);)p&&"\n"===t&&this.newlines<=u&&(this.newlines+=1),this.pos++,t=this.input.charAt(this.pos);return!0}return!1},this.space_or_wrap=function(t){this.line_char_count>=this.wrap_line_length?(this.print_newline(!1,t),this.print_indentation(t)):(this.line_char_count++,t.push(" "))},this.get_content=function(){for(var t="",e=[];"<"!==this.input.charAt(this.pos);){if(this.pos>=this.input.length)return e.length?e.join(""):["","TK_EOF"];if(this.traverse_whitespace())this.space_or_wrap(e);else{if(g){var i=this.input.substr(this.pos,3);if("{{#"===i||"{{/"===i)break;if("{{"===this.input.substr(this.pos,2)&&"{{else}}"===this.get_tag(!0))break}t=this.input.charAt(this.pos),this.pos++,this.line_char_count++,e.push(t)}}return e.length?e.join(""):""},this.get_contents_to=function(t){if(this.pos===this.input.length)return["","TK_EOF"];var e="",i=new RegExp("</"+t+"\\s*>","igm");i.lastIndex=this.pos;var n=i.exec(this.input),s=n?n.index:this.input.length;return this.pos<s&&(e=this.input.substring(this.pos,s),this.pos=s),e},this.record_tag=function(t){this.tags[t+"count"]?this.tags[t+"count"]++:this.tags[t+"count"]=1,this.tags[t+this.tags[t+"count"]]=this.indent_level,this.tags[t+this.tags[t+"count"]+"parent"]=this.tags.parent,this.tags.parent=t+this.tags[t+"count"]},this.retrieve_tag=function(t){if(this.tags[t+"count"]){for(var e=this.tags.parent;e&&t+this.tags[t+"count"]!==e;)e=this.tags[e+"parent"];e&&(this.indent_level=this.tags[t+this.tags[t+"count"]],this.tags.parent=this.tags[e+"parent"]),delete this.tags[t+this.tags[t+"count"]+"parent"],delete this.tags[t+this.tags[t+"count"]],1===this.tags[t+"count"]?delete this.tags[t+"count"]:this.tags[t+"count"]--}},this.indent_to_tag=function(t){if(this.tags[t+"count"]){for(var e=this.tags.parent;e&&t+this.tags[t+"count"]!==e;)e=this.tags[e+"parent"];e&&(this.indent_level=this.tags[t+this.tags[t+"count"]])}},this.get_tag=function(t){var e,i,n="",s=[],h="",r=!1,a=this.pos,_=this.line_char_count;t=void 0!==t&&t;do{if(this.pos>=this.input.length)return t&&(this.pos=a,this.line_char_count=_),s.length?s.join(""):["","TK_EOF"];if(n=this.input.charAt(this.pos),this.pos++,this.Utils.in_array(n,this.Utils.whitespace))r=!0;else{if("'"!==n&&'"'!==n||(n+=this.get_unformatted(n),r=!0),"="===n&&(r=!1),s.length&&"="!==s[s.length-1]&&">"!==n&&r&&(this.space_or_wrap(s),r=!1),g&&"<"===i&&n+this.input.charAt(this.pos)==="{{"&&(n+=this.get_unformatted("}}"),s.length&&" "!==s[s.length-1]&&"<"!==s[s.length-1]&&(n=" "+n),r=!0),"<"!==n||i||(e=this.pos-1,i="<"),g&&!i&&2<=s.length&&"{"===s[s.length-1]&&"{"==s[s.length-2]&&(e="#"===n||"/"===n?this.pos-3:this.pos-2,i="{"),this.line_char_count++,s.push(n),s[1]&&"!"===s[1]){s=[this.get_comment(e)];break}if(g&&"{"===i&&2<s.length&&"}"===s[s.length-2]&&"}"===s[s.length-1])break}}while(">"!==n);var o,p,u=s.join("");o=-1!==u.indexOf(" ")?u.indexOf(" "):"{"===u[0]?u.indexOf("}"):u.indexOf(">"),p="<"!==u[0]&&g?"#"===u[2]?3:2:1;var l=u.substring(p,o).toLowerCase();return"/"===u.charAt(u.length-2)||this.Utils.in_array(l,this.Utils.single_token)?t||(this.tag_type="SINGLE"):g&&"{"===u[0]&&"else"===l?t||(this.indent_to_tag("if"),this.tag_type="HANDLEBARS_ELSE",this.indent_content=!0,this.traverse_whitespace()):this.is_unformatted(l,c)?(h=this.get_unformatted("</"+l+">",u),s.push(h),this.pos,this.tag_type="SINGLE"):"script"===l&&(-1===u.search("type")||-1<u.search("type")&&-1<u.search(/\b(text|application)\/(x-)?(javascript|ecmascript|jscript|livescript)/))?t||(this.record_tag(l),this.tag_type="SCRIPT"):"style"===l&&(-1===u.search("type")||-1<u.search("type")&&-1<u.search("text/css"))?t||(this.record_tag(l),this.tag_type="STYLE"):"!"===l.charAt(0)?t||(this.tag_type="SINGLE",this.traverse_whitespace()):t||("/"===l.charAt(0)?(this.retrieve_tag(l.substring(1)),this.tag_type="END"):(this.record_tag(l),"html"!==l.toLowerCase()&&(this.indent_content=!0),this.tag_type="START"),this.traverse_whitespace()&&this.space_or_wrap(s),this.Utils.in_array(l,this.Utils.extra_liners)&&(this.print_newline(!1,this.output),this.output.length&&"\n"!==this.output[this.output.length-2]&&this.print_newline(!0,this.output))),t&&(this.pos=a,this.line_char_count=_),s.join("")},this.get_comment=function(t){var e="",i=">",n=!1;for(this.pos=t,input_char=this.input.charAt(this.pos),this.pos++;this.pos<=this.input.length&&((e+=input_char)[e.length-1]!==i[i.length-1]||-1===e.indexOf(i));)!n&&e.length<10&&(0===e.indexOf("<![if")?(i="<![endif]>",n=!0):0===e.indexOf("<![cdata[")?(i="]]>",n=!0):0===e.indexOf("<![")?(i="]>",n=!0):0===e.indexOf("<!--")&&(i="-->",n=!0)),input_char=this.input.charAt(this.pos),this.pos++;return e},this.get_unformatted=function(t,e){if(e&&-1!==e.toLowerCase().indexOf(t))return"";var i="",n="",s=0,h=!0;do{if(this.pos>=this.input.length)return n;if(i=this.input.charAt(this.pos),this.pos++,this.Utils.in_array(i,this.Utils.whitespace)){if(!h){this.line_char_count--;continue}if("\n"===i||"\r"===i){n+="\n",this.line_char_count=0;continue}}n+=i,this.line_char_count++,h=!0,g&&"{"===i&&n.length&&"{"===n[n.length-2]&&(s=(n+=this.get_unformatted("}}")).length)}while(-1===n.toLowerCase().indexOf(t,s));return n},this.get_token=function(){var t;if("TK_TAG_SCRIPT"===this.last_token||"TK_TAG_STYLE"===this.last_token){var e=this.last_token.substr(7);return"string"!=typeof(t=this.get_contents_to(e))?t:[t,"TK_"+e]}return"CONTENT"===this.current_mode?"string"!=typeof(t=this.get_content())?t:[t,"TK_CONTENT"]:"TAG"===this.current_mode?"string"!=typeof(t=this.get_tag())?t:[t,"TK_TAG_"+this.tag_type]:void 0},this.get_full_indent=function(t){return(t=this.indent_level+t||0)<1?"":Array(t+1).join(this.indent_string)},this.is_unformatted=function(t,e){if(!this.Utils.in_array(t,e))return!1;if("a"!==t.toLowerCase()||!this.Utils.in_array("a",e))return!0;var i=(this.get_tag(!0)||"").match(/^\s*<\s*\/?([a-z]*)\s*[^>]*>\s*$/);return!(i&&!this.Utils.in_array(i,e))},this.printer=function(t,e,i,n,s){this.input=t||"",this.output=[],this.indent_character=e,this.indent_string="",this.indent_size=i,this.brace_style=s,this.indent_level=0,this.wrap_line_length=n;for(var h=this.line_char_count=0;h<this.indent_size;h++)this.indent_string+=this.indent_character;this.print_newline=function(t,e){this.line_char_count=0,e&&e.length&&(t||"\n"!==e[e.length-1])&&("\n"!==e[e.length-1]&&(e[e.length-1]=E(e[e.length-1])),e.push("\n"))},this.print_indentation=function(t){for(var e=0;e<this.indent_level;e++)t.push(this.indent_string),this.line_char_count+=this.indent_string.length},this.print_token=function(t){this.is_whitespace(t)&&!this.output.length||((t||""!==t)&&this.output.length&&"\n"===this.output[this.output.length-1]&&(this.print_indentation(this.output),t=t.replace(/^\s+/g,"")),this.print_token_raw(t))},this.print_token_raw=function(t){0<this.newlines&&(t=E(t)),t&&""!==t&&(1<t.length&&"\n"===t[t.length-1]?(this.output.push(t.slice(0,-1)),this.print_newline(!1,this.output)):this.output.push(t));for(var e=0;e<this.newlines;e++)this.print_newline(0<e,this.output);this.newlines=0},this.indent=function(){this.indent_level++},this.unindent=function(){0<this.indent_level&&this.indent_level--}},this}).printer(t,a,r,_,o);;){var f=s.get_token();if(s.token_text=f[0],s.token_type=f[1],"TK_EOF"===s.token_type)break;switch(s.token_type){case"TK_TAG_START":s.print_newline(!1,s.output),s.print_token(s.token_text),s.indent_content&&(s.indent(),s.indent_content=!1),s.current_mode="CONTENT";break;case"TK_TAG_STYLE":case"TK_TAG_SCRIPT":s.print_newline(!1,s.output),s.print_token(s.token_text),s.current_mode="CONTENT";break;case"TK_TAG_END":if("TK_CONTENT"===s.last_token&&""===s.last_text){var d=s.token_text.match(/\w+/)[0],w=null;s.output.length&&(w=s.output[s.output.length-1].match(/(?:<|{{#)\s*(\w+)/)),null!==w&&w[1]===d||s.print_newline(!1,s.output)}s.print_token(s.token_text),s.current_mode="CONTENT";break;case"TK_TAG_SINGLE":var y=s.token_text.match(/^\s*<([a-z-]+)/i);y&&s.Utils.in_array(y[1],c)||s.print_newline(!1,s.output),s.print_token(s.token_text),s.current_mode="CONTENT";break;case"TK_TAG_HANDLEBARS_ELSE":s.print_token(s.token_text),s.indent_content&&(s.indent(),s.indent_content=!1),s.current_mode="CONTENT";break;case"TK_CONTENT":s.print_token(s.token_text),s.current_mode="TAG";break;case"TK_STYLE":case"TK_SCRIPT":if(""!==s.token_text){s.print_newline(!1,s.output);var T,v=s.token_text,k=1;"TK_SCRIPT"===s.token_type?T="function"==typeof i&&i:"TK_STYLE"===s.token_type&&(T="function"==typeof n&&n),"keep"===e.indent_scripts?k=0:"separate"===e.indent_scripts&&(k=-s.indent_level);var b=s.get_full_indent(k);if(T)v=T(v.replace(/^\s*/,b),e);else{var m=v.match(/^\s*/)[0].match(/[^\n\r]*$/)[0].split(s.indent_string).length-1,x=s.get_full_indent(k-m);v=v.replace(/^\s*/,b).replace(/\r\n|\r|\n/g,"\n"+x).replace(/\s+$/,"")}v&&(s.print_token_raw(v),s.print_newline(!0,s.output))}s.current_mode="TAG";break;default:""!==s.token_text&&s.print_token(s.token_text)}s.last_token=s.token_type,s.last_text=s.token_text}var A=s.output.join("").replace(/[\r\n\t ]+$/,"");return l&&(A+="\n"),A}if("function"==typeof define&&define.amd)define(["require","./beautify","./beautify-css"],function(t){var i=t("./beautify"),n=t("./beautify-css");return{html_beautify:function(t,e){return s(t,e,i.js_beautify,n.css_beautify)}}});else if("undefined"!=typeof exports){var i=require("./beautify.js"),n=require("./beautify-css.js");exports.html_beautify=function(t,e){return s(t,e,i.js_beautify,n.css_beautify)}}else"undefined"!=typeof window?window.html_beautify=function(t,e){return s(t,e,window.js_beautify,window.css_beautify)}:"undefined"!=typeof global&&(global.html_beautify=function(t,e){return s(t,e,global.js_beautify,global.css_beautify)})}();