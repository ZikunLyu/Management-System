/*!
 DataTables Foundation integration
 ©2011-2014 SpryMedia Ltd - datatables.net/license
*/
(function(){var f=function(d,b){d.extend(b.ext.classes,{sWrapper:"dataTables_wrapper dt-foundation"});d.extend(!0,b.defaults,{dom:"<'row'<'small-6 columns'l><'small-6 columns'f>r>t<'row'<'small-6 columns'i><'small-6 columns'p>>",renderer:"foundation"});b.ext.renderer.pageButton.foundation=function(g,f,p,k,h,l){var q=new b.Api(g),r=g.oClasses,i=g.oLanguage.oPaginate,c,e,o=function(b,f){var j,m,n,a,k=function(a){a.preventDefault();"ellipsis"!==a.data.action&&q.page(a.data.action).draw(!1)};j=0;for(m=
f.length;j<m;j++)if(a=f[j],d.isArray(a))o(b,a);else{e=c="";switch(a){case "ellipsis":c="&hellip;";e="unavailable";break;case "first":c=i.sFirst;e=a+(0<h?"":" unavailable");break;case "previous":c=i.sPrevious;e=a+(0<h?"":" unavailable");break;case "next":c=i.sNext;e=a+(h<l-1?"":" unavailable");break;case "last":c=i.sLast;e=a+(h<l-1?"":" unavailable");break;default:c=a+1,e=h===a?"current":""}c&&(n=d("<li>",{"class":r.sPageButton+" "+e,"aria-controls":g.sTableId,tabindex:g.iTabIndex,id:0===p&&"string"===
typeof a?g.sTableId+"_"+a:null}).append(d("<a>",{href:"#"}).html(c)).appendTo(b),g.oApi._fnBindAction(n,{action:a},k))}};o(d(f).empty().html('<ul class="pagination"/>').children("ul"),k)};b.TableTools&&(d.extend(!0,b.TableTools.classes,{container:"DTTT button-group",buttons:{normal:"button",disabled:"disabled"},collection:{container:"DTTT_dropdown dropdown-menu",buttons:{normal:"",disabled:"disabled"}},select:{row:"active"}}),d.extend(!0,b.TableTools.DEFAULTS.oTags,{collection:{container:"ul",button:"li",
liner:"a"}}))};"function"===typeof define&&define.amd?define(["jquery","datatables"],f):"object"===typeof exports?f(require("jquery"),require("datatables")):jQuery&&f(jQuery,jQuery.fn.dataTable)})(window,document);
