var thickDims,tbWidth,tbHeight;jQuery(document).ready(function(a){thickDims=function(){var f=a("#TB_window"),d=a(window).height(),b=a(window).width(),c,e;c=(tbWidth&&tbWidth<b-90)?tbWidth:b-90;e=(tbHeight&&tbHeight<d-60)?tbHeight:d-60;if(f.size()){f.width(c).height(e);a("#TB_iframeContent").width(c).height(e-27);f.css({"margin-left":"-"+parseInt((c/2),10)+"px"});if(typeof document.body.style.maxWidth!="undefined"){f.css({top:"30px","margin-top":"0"})}}};thickDims();a(window).resize(function(){thickDims()});a("a.thickbox-preview").click(function(){tb_click.call(this);var d=a(this).parents(".available-theme").find(".activatelink"),e="",b=a(this).attr("href"),c,f;if(tbWidth=b.match(/&tbWidth=[0-9]+/)){tbWidth=parseInt(tbWidth[0].replace(/[^0-9]+/g,""),10)}else{tbWidth=a(window).width()-90}if(tbHeight=b.match(/&tbHeight=[0-9]+/)){tbHeight=parseInt(tbHeight[0].replace(/[^0-9]+/g,""),10)}else{tbHeight=a(window).height()-60}if(d.length){c=d.attr("href")||"";f=d.attr("title")||"";e='&nbsp; <a href="'+c+'" target="_top" class="tb-theme-preview-link">'+f+"</a>"}else{f=a(this).attr("title")||"";e='&nbsp; <span class="tb-theme-preview-link">'+f+"</span>"}a("#TB_title").css({"background-color":"#222",color:"#dfdfdf"});a("#TB_closeAjaxWindow").css({"float":"left"});a("#TB_ajaxWindowTitle").css({"float":"right"}).html(e);a("#TB_iframeContent").width("100%");thickDims();return false})});