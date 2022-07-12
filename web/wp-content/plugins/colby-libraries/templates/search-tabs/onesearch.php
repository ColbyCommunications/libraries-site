<?php require_once ABSPATH . 'wp-admin/includes/plugin.php'; // Import is_plugin_active function.
if (is_plugin_active('colby-onesearch/colby-onesearch.php') && ! $_GET['summon-search'] ) : ?>

    <?php /*
    <form action=<?php echo get_site_url(); ?>/search-results/>
    // sunsetting the bento box
    <input type=hidden name=type value=k>
    <fieldset>
    <input id=search_box
         type=text
         name=q
         autofocus=autofocus
         autocomplete=off
         placeholder="<?php echo $colby_libraries->placeholder_text; ?>"
         class=summon-search-field>
      <input type=submit value="Search >">
    </fieldset>
    </form>
    */ ?>
    <?php /* native summon interface */ ?>
    <script type="text/javascript">!function(global){"use strict";var object_defineProperty=!0;try{Object.defineProperty({},"x",{})}catch(e){object_defineProperty=!1}!function(){for(var lastTime=0,vendors=["webkit","moz"],x=0;x<vendors.length&&!global.requestAnimationFrame;++x)global.requestAnimationFrame=global[vendors[x]+"RequestAnimationFrame"],global.cancelAnimationFrame=global[vendors[x]+"CancelAnimationFrame"]||global[vendors[x]+"CancelRequestAnimationFrame"];(!global.requestAnimationFrame||/iP(ad|hone|od).*OS 6/.test(global.navigator.userAgent))&&(global.requestAnimationFrame=function(callback){var currTime=(new Date).getTime(),timeToCall=Math.max(0,16-(currTime-lastTime)),id=global.setTimeout(function(){callback(currTime+timeToCall)},timeToCall);return lastTime=currTime+timeToCall,id}),global.cancelAnimationFrame||(global.cancelAnimationFrame=function(id){clearTimeout(id)})}(),Array.isArray||(Array.isArray=function(arg){return"[object Array]"===Object.prototype.toString.call(arg)}),"textContent"in document.documentElement||function(createElement){var onPropertyChange=function(e){"textContent"===e.propertyName&&(e.srcElement.innerText=e.srcElement.textContent)};document.createElement=function(tagName){var element=createElement(tagName);return element.textContent="",element.attachEvent("onpropertychange",onPropertyChange),element}}(document.createElement),"classList"in document.documentElement||function(join,splice,createElement){if(object_defineProperty){var DOMEx=function(type,message){this.name=type,this.code=DOMException[type],this.message=message},strTrim=String.prototype.trim||function(){return this.replace(/^\s+|\s+$/g,"")},arrIndexOf=Array.prototype.indexOf||function(item){for(var i=0,len=this.length;len>i;i++)if(i in this&&this[i]===item)return i;return-1},checkTokenAndGetIndex=function(classList,token){if(""===token)throw new DOMEx("SYNTAX_ERR","An invalid or illegal string was specified");if(/\s/.test(token))throw new DOMEx("INVALID_CHARACTER_ERR","String contains an invalid character");return arrIndexOf.call(classList,token)},classListObject=function(elem){for(var trimmedClasses=strTrim.call(elem.getAttribute("class")||""),classes=trimmedClasses?trimmedClasses.split(/\s+/):[],i=0,len=classes.length;len>i;i++)this.push(classes[i]);this._updateClassName=function(){elem.setAttribute("class",this.toString())}},classListProto=classListObject.prototype=[];classListProto.item=function(i){return this[i]||null},classListProto.contains=function(token){return token+="",-1!==checkTokenAndGetIndex(this,token)},classListProto.add=function(){var token,tokens=arguments,i=0,l=tokens.length,updated=!1;do token=tokens[i]+"",-1===checkTokenAndGetIndex(this,token)&&(this.push(token),updated=!0);while(++i<l);updated&&this._updateClassName()},classListProto.remove=function(){var token,index,tokens=arguments,i=0,l=tokens.length,updated=!1;do for(token=tokens[i]+"",index=checkTokenAndGetIndex(this,token);-1!==index;)this.splice(index,1),updated=!0,index=checkTokenAndGetIndex(this,token);while(++i<l);updated&&this._updateClassName()},classListProto.toggle=function(token,force){token+="";var result=this.contains(token),method=result?force!==!0&&"remove":force!==!1&&"add";return method&&this[method](token),force===!0||force===!1?force:!result},classListProto.toString=function(){return this.join(" ")};var classListGetter=function(){return new classListObject(this)};Object.defineProperty(global.Element.prototype,"classList",{get:classListGetter,enumerable:!0,configurable:!0})}else{var tokenize=function(token){if(/^-?[_a-zA-Z]+[_a-zA-Z0-9-]*$/.test(token))return String(token);throw new Error("InvalidCharacterError: DOM Exception 5")},toObject=function(self){for(var element,index=-1,object={};element=self[++index];)object[element]=!0;return object},fromObject=function(self,object){var token,array=[];for(token in object)object[token]&&array.push(token);splice.apply(self,[0,self.length].concat(array))};document.createElement=function(tagName){var element=createElement(tagName),classList=[];return element.classList={add:function(){for(var token,object=toObject(classList),index=0;index in arguments;++index)token=tokenize(arguments[index]),object[token]=!0;fromObject(classList,object),element.className=join.call(classList," ")},remove:function(){for(var token,object=toObject(classList),index=0;index in arguments;++index)token=tokenize(arguments[index]),object[token]=!1;fromObject(classList,object),element.className=join.call(classList," ")}},element}}}(Array.prototype.join,Array.prototype.splice,document.createElement),Object.keys||(Object.keys=function(){var hasOwnProperty=Object.prototype.hasOwnProperty,hasDontEnumBug=!{toString:null}.propertyIsEnumerable("toString"),dontEnums=["toString","toLocaleString","valueOf","hasOwnProperty","isPrototypeOf","propertyIsEnumerable","constructor"],dontEnumsLength=dontEnums.length;return function(obj){if("object"!=typeof obj&&("function"!=typeof obj||null===obj))throw new TypeError("Object.keys called on non-object");var prop,i,result=[];for(prop in obj)hasOwnProperty.call(obj,prop)&&result.push(prop);if(hasDontEnumBug)for(i=0;dontEnumsLength>i;i++)hasOwnProperty.call(obj,dontEnums[i])&&result.push(dontEnums[i]);return result}}()),Array.prototype.forEach||(Array.prototype.forEach=function(callback,thisArg){var T,k;if(null==this)throw new TypeError(" this is null or not defined");var O=Object(this),len=O.length>>>0;if("function"!=typeof callback)throw new TypeError(callback+" is not a function");for(arguments.length>1&&(T=thisArg),k=0;len>k;){var kValue;k in O&&(kValue=O[k],callback.call(T,kValue,k,O)),k++}}),Array.prototype.map||(Array.prototype.map=function(callback,thisArg){var T,A,k;if(null==this)throw new TypeError(" this is null or not defined");var O=Object(this),len=O.length>>>0;if("function"!=typeof callback)throw new TypeError(callback+" is not a function");for(arguments.length>1&&(T=thisArg),A=new Array(len),k=0;len>k;){var kValue,mappedValue;k in O&&(kValue=O[k],mappedValue=callback.call(T,kValue,k,O),A[k]=mappedValue),k++}return A}),document.createElementNS||function(createElement){document.createElementNS=function(namespace,tagName){return createElement(tagName)}}(document.createElement)}(this),function(){this.summonWidget||(this.summonWidget={addClass:function(name,clss){return null==this[name]?this[name]=clss:void 0},replaceClass:function(name,clss){return null!=this[name]?this[name]=clss:void 0},init:function(widget,opts,el){return null!=this[widget]?new this[widget](opts,el):void 0},box:function(opts,el){return this.init("Box",opts,el)},search:function(opts,el){return this.init("Search",opts,el)}})}.call(this),function(){var Maquette;Maquette=function(){function Maquette(){!function(e,t){"function"==typeof define&&define.amd?define(["exports"],t):t("object"==typeof exports&&"string"!=typeof exports.nodeName?exports:e.maquette={})}(this,function(e){var t,r,o="https://www.w3.org/",n=o+"2000/svg",i=o+"1999/xlink",a=[],s=function(e,t){var r={};return Object.keys(e).forEach(function(t){r[t]=e[t]}),t&&Object.keys(t).forEach(function(e){r[e]=t[e]}),r},d=function(e,t){return e.vnodeSelector!==t.vnodeSelector?!1:e.properties&&t.properties?e.properties.key!==t.properties.key?!1:e.properties.bind===t.properties.bind:!e.properties&&!t.properties},p=function(e){return{vnodeSelector:"",properties:void 0,children:void 0,text:e.toString(),domNode:null}},c=function(e,t,r){for(var o=0,n=t.length;n>o;o++){var i=t[o];Array.isArray(i)?c(e,i,r):null!==i&&void 0!==i&&(i.hasOwnProperty("vnodeSelector")||(i=p(i)),r.push(i))}},u=function(){throw new Error("Provide a transitions object to the projectionOptions to do animations")},f={namespace:void 0,eventHandlerInterceptor:void 0,styleApplyer:function(e,t,r){e.style[t]=r},transitions:{enter:u,exit:u}},l=function(e){return s(f,e)},v=function(e){if("string"!=typeof e)throw new Error("Style values must be strings")},h=function(e,t,r){if(t)for(var o=r.eventHandlerInterceptor,a=Object.keys(t),s=a.length,d=0;s>d;d++){var p=a[d],c=t[p];if("className"===p)throw new Error('Property "className" is not supported, use "class".');if("class"===p)c.split(/\s+/).forEach(function(t){return e.classList.add(t)});else if("classes"===p)for(var u=Object.keys(c),f=u.length,l=0;f>l;l++){var h=u[l];c[h]&&e.classList.add(h)}else if("styles"===p)for(var m=Object.keys(c),y=m.length,l=0;y>l;l++){var g=m[l],N=c[g];N&&(v(N),r.styleApplyer(e,g,N))}else{if("key"===p)continue;if(null===c||void 0===c)continue;var b=typeof c;"function"===b?0===p.lastIndexOf("on",0)&&(o&&(c=o(p,c,e,t)),"oninput"===p&&!function(){var e=c;c=function(t){t.target["oninput-value"]=t.target.value,e.apply(this,[t])}}(),e[p]=c):"string"===b&&"value"!==p&&"innerHTML"!==p?r.namespace===n&&"href"===p?e.setAttributeNS(i,p,c):e.setAttribute(p,c):e[p]=c}}},m=function(e,t,r,o){if(r){for(var a=!1,s=Object.keys(r),d=s.length,p=0;d>p;p++){var c=s[p],u=r[c],f=t[c];if("class"===c){if(f!==u)throw new Error('"class" property may not be updated. Use the "classes" property for conditional css classes.')}else if("classes"===c)for(var l=e.classList,h=Object.keys(u),m=h.length,y=0;m>y;y++){var g=h[y],N=!!u[g],b=!!f[g];N!==b&&(a=!0,N?l.add(g):l.remove(g))}else if("styles"===c)for(var w=Object.keys(u),x=w.length,y=0;x>y;y++){var S=w[y],A=u[S],k=f[S];A!==k&&(a=!0,A?(v(A),o.styleApplyer(e,S,A)):o.styleApplyer(e,S,""))}else if(u||"string"!=typeof f||(u=""),"value"===c)e[c]!==u&&e["oninput-value"]!==u&&(e[c]=u,e["oninput-value"]=void 0),u!==f&&(a=!0);else if(u!==f){var E=typeof u;if("function"===E)throw new Error("Functions may not be updated on subsequent renders (property: "+c+"). Hint: declare event handler functions outside the render() function.");"string"===E&&"innerHTML"!==c?o.namespace===n&&"href"===c?e.setAttributeNS(i,c,u):e.setAttribute(c,u):e[c]!==u&&(e[c]=u),a=!0}}return a}},y=function(e,t,r){if(""!==t.vnodeSelector)for(var o=r;o<e.length;o++)if(d(e[o],t))return o;return-1},g=function(e,t){if(e.properties){var r=e.properties.enterAnimation;r&&("function"==typeof r?r(e.domNode,e.properties):t.enter(e.domNode,e.properties,r))}},N=function(e,t){var r=e.domNode;if(e.properties){var o=e.properties.exitAnimation;if(o){r.style.pointerEvents="none";var n=function(){r.parentNode&&r.parentNode.removeChild(r)};return"function"==typeof o?void o(r,n,e.properties):void t.exit(e.domNode,e.properties,o,n)}}r.parentNode&&r.parentNode.removeChild(r)},b=function(e,t,r,o){var n=e[t];if(""!==n.vnodeSelector){var i=n.properties,a=i?void 0===i.key?i.bind:i.key:void 0;if(!a)for(var s=0;s<e.length;s++)if(s!==t){var p=e[s];if(d(p,n))throw new Error("added"===o?r.vnodeSelector+" had a "+n.vnodeSelector+" child added, but there is now more than one. You must add unique key properties to make them distinguishable.":r.vnodeSelector+" had a "+n.vnodeSelector+" child removed, but there were more than one. You must add unique key properties to make them distinguishable.")}}},w=function(e,o,n,i,s){if(n===i)return!1;n=n||a,i=i||a;for(var p,c=n.length,u=i.length,f=s.transitions,l=0,v=0,h=!1;u>v;){var m=c>l?n[l]:void 0,w=i[v];if(void 0!==m&&d(m,w))h=r(m,w,s)||h,l++;else{var x=y(n,w,l+1);if(x>=0){for(p=l;x>p;p++)N(n[p],f),b(n,p,e,"removed");h=r(n[x],w,s)||h,l=x+1}else t(w,o,c>l?n[l].domNode:void 0,s),g(w,f),b(i,v,e,"added")}v++}if(c>l)for(p=l;c>p;p++)N(n[p],f),b(n,p,e,"removed");return h},x=function(e,r,o){if(r)for(var n=0;n<r.length;n++)t(r[n],e,void 0,o)},S=function(e,t,r){x(e,t.children,r),t.text&&(e.textContent=t.text),h(e,t.properties,r),t.properties&&t.properties.afterCreate&&t.properties.afterCreate.apply(t.properties.bind||t.properties,[e,r,t.vnodeSelector,t.properties,t.children])};t=function(e,t,r,o){var i,a,d,p,c,u=0,f=e.vnodeSelector;if(""===f)i=e.domNode=document.createTextNode(e.text),void 0!==r?t.insertBefore(i,r):t.appendChild(i);else{for(a=0;a<=f.length;++a)d=f.charAt(a),(a===f.length||"."===d||"#"===d)&&(p=f.charAt(u-1),c=f.slice(u,a),"."===p?i.classList.add(c):"#"===p?i.id=c:("svg"===c&&(o=s(o,{namespace:n})),i=e.domNode=void 0!==o.namespace?document.createElementNS(o.namespace,c):document.createElement(c),void 0!==r?t.insertBefore(i,r):t.appendChild(i)),u=a+1);S(i,e,o)}},r=function(e,t,r){var o=e.domNode,i=!1;if(e===t)return!1;var a=!1;if(""===t.vnodeSelector){if(t.text!==e.text){var d=document.createTextNode(t.text);return o.parentNode.replaceChild(d,o),t.domNode=d,i=!0}}else 0===t.vnodeSelector.lastIndexOf("svg",0)&&(r=s(r,{namespace:n})),e.text!==t.text&&(a=!0,void 0===t.text?o.removeChild(o.firstChild):o.textContent=t.text),a=w(t,o,e.children,t.children,r)||a,a=m(o,e.properties,t.properties,r)||a,t.properties&&t.properties.afterUpdate&&t.properties.afterUpdate.apply(t.properties.bind||t.properties,[o,r,t.vnodeSelector,t.properties,t.children]);return a&&t.properties&&t.properties.updateAnimation&&t.properties.updateAnimation(o,t.properties,e.properties),t.domNode=e.domNode,i};var A=function(e,t){return{update:function(o){if(e.vnodeSelector!==o.vnodeSelector)throw new Error("The selector for the root VNode may not be changed. (consider using dom.merge and add one extra level to the virtual DOM)");r(e,o,t),e=o},domNode:e.domNode}};e.h=function(e){var t=arguments[1];if("string"!=typeof e)throw new Error;var r=1;!t||t.hasOwnProperty("vnodeSelector")||Array.isArray(t)||"object"!=typeof t?t=void 0:r=2;var o=void 0,n=void 0,i=arguments.length;if(i===r+1){var a=arguments[r];"string"==typeof a?o=a:void 0!==a&&null!==a&&1===a.length&&"string"==typeof a[0]&&(o=a[0])}if(void 0===o)for(n=[];i>r;r++){var s=arguments[r];null!==s&&void 0!==s&&(Array.isArray(s)?c(e,s,n):n.push(s.hasOwnProperty("vnodeSelector")?s:p(s)))}return{vnodeSelector:e,properties:t,children:n,text:""===o?void 0:o,domNode:null}},e.dom={create:function(e,r){return r=l(r),t(e,document.createElement("div"),void 0,r),A(e,r)},append:function(e,r,o){return o=l(o),t(r,e,void 0,o),A(r,o)},insertBefore:function(e,r,o){return o=l(o),t(r,e.parentNode,e,o),A(r,o)},merge:function(e,t,r){return r=l(r),t.domNode=e,S(e,t,r),A(t,r)}},e.createCache=function(){var e=void 0,t=void 0,r={invalidate:function(){t=void 0,e=void 0},result:function(r,o){if(e)for(var n=0;n<r.length;n++)e[n]!==r[n]&&(t=void 0);return t||(t=o(),e=r),t}};return r},e.createMapping=function(e,t,r){var o=[],n=[];return{results:n,map:function(i){for(var a=i.map(e),s=n.slice(),d=0,p=0;p<i.length;p++){var c=i[p],u=a[p];if(u===o[d])n[p]=s[d],r(c,s[d],p),d++;else{for(var f=!1,l=1;l<o.length+1;l++){var v=(d+l)%o.length;if(o[v]===u){n[p]=s[v],r(i[p],s[v],p),d=v+1,f=!0;break}}f||(n[p]=t(c,p))}}n.length=i.length,o=a}}},e.createProjector=function(r){var o,n=l(r);n.eventHandlerInterceptor=function(e,t,r,n){return function(){return o.scheduleRender(),t.apply(n.bind||this,arguments)}};var i,a=!0,s=!1,d=[],p=[],c=function(){if(i=void 0,a){a=!1;for(var e=0;e<d.length;e++){var t=p[e]();d[e].update(t)}a=!0}};return o={scheduleRender:function(){i||s||(i=requestAnimationFrame(c))},stop:function(){i&&(cancelAnimationFrame(i),i=void 0),s=!0},resume:function(){s=!1,a=!0,o.scheduleRender()},append:function(t,r){d.push(e.dom.append(t,r(),n)),p.push(r)},insertBefore:function(t,r){d.push(e.dom.insertBefore(t,r(),n)),p.push(r)},merge:function(t,r){d.push(e.dom.merge(t,r(),n)),p.push(r)},replace:function(e,r){var o=r();t(o,e.parentNode,e,n),e.parentNode.removeChild(e),d.push(A(o,n)),p.push(r)},detach:function(e){for(var t=0;t<p.length;t++)if(p[t]===e)return p.splice(t,1),d.splice(t,1)[0];throw new Error("renderMaquetteFunction was not found")}}}}),this.h=this.maquette.h,this.projector=this.maquette.createProjector()}return Maquette}(),this.summonWidget.addClass("Maquette",Maquette)}.call(this),function(){function Autocomplete(options){function hasClass(el,className){return el.classList?el.classList.contains(className):new RegExp("\\b"+className+"\\b").test(el.className)}function addEvent(el,type,handler){el.attachEvent?el.attachEvent("on"+type,handler):el.addEventListener(type,handler)}function removeEvent(el,type,handler){el.detachEvent?el.detachEvent("on"+type,handler):el.removeEventListener(type,handler)}function live(elClass,event,cb,context){addEvent(context||document,event,function(e){for(var found,el=e.target||e.srcElement;el&&!(found=hasClass(el,elClass));)el=el.parentElement;found&&cb.call(el,e)})}if(document.querySelector){var o={selector:0,source:0,minChars:3,delay:150,offsetLeft:0,offsetTop:1,cache:1,menuClass:"",renderItem:function(item,search){search=search.replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&");var re=new RegExp("("+search.split(" ").join("|")+")","gi");return'<div class="autocomplete-suggestion" data-val="'+item+'">'+item.replace(re,"<b>$1</b>")+"</div>"},onSelect:function(){}};for(var k in options)options.hasOwnProperty(k)&&(o[k]=options[k]);for(var elems="object"==typeof o.selector?[o.selector]:document.querySelectorAll(o.selector),i=0;i<elems.length;i++){var that=elems[i];that.sc=document.createElement("div"),that.sc.className="autocomplete-suggestions "+o.menuClass,options.id&&that.sc.setAttribute("id",options.id),that.sc.className="autocomplete-suggestions "+o.menuClass,that.autocompleteAttr=that.getAttribute("autocomplete"),that.setAttribute("autocomplete","off"),that.cache={},that.last_val="",that.updateSC=function(resize,next){var rect=that.getBoundingClientRect();if(that.sc.style.left=Math.round(rect.left+(window.pageXOffset||document.documentElement.scrollLeft)+o.offsetLeft)+"px",that.sc.style.top=Math.round(rect.bottom+(window.pageYOffset||document.documentElement.scrollTop)+o.offsetTop)+"px",that.sc.style.width=Math.round(rect.right-rect.left)+"px",!resize&&(that.sc.style.display="block",that.sc.maxHeight||(that.sc.maxHeight=parseInt((window.getComputedStyle?getComputedStyle(that.sc,null):that.sc.currentStyle).maxHeight)),that.sc.suggestionHeight||(that.sc.suggestionHeight=that.sc.querySelector(".autocomplete-suggestion").offsetHeight),that.sc.suggestionHeight))if(next){var scrTop=that.sc.scrollTop,selTop=next.getBoundingClientRect().top-that.sc.getBoundingClientRect().top;selTop+that.sc.suggestionHeight-that.sc.maxHeight>0?that.sc.scrollTop=selTop+that.sc.suggestionHeight+scrTop-that.sc.maxHeight:0>selTop&&(that.sc.scrollTop=selTop+scrTop)}else that.sc.scrollTop=0},addEvent(window,"resize",that.updateSC),document.body.appendChild(that.sc),live("autocomplete-suggestion","mouseleave",function(){var sel=that.sc.querySelector(".autocomplete-suggestion.selected");sel&&setTimeout(function(){sel.className=sel.className.replace("selected","")},20)},that.sc),live("autocomplete-suggestion","mouseover",function(){var sel=that.sc.querySelector(".autocomplete-suggestion.selected");sel&&(sel.className=sel.className.replace("selected","")),this.className+=" selected"},that.sc),live("autocomplete-suggestion","mousedown",function(e){if(hasClass(this,"autocomplete-suggestion")){var v=this.getAttribute("data-val");that.value=v,o.onSelect(e,v,this),that.sc.style.display="none"}},that.sc),that.blurHandler=function(){try{var over_sb=document.querySelector(".autocomplete-suggestions:hover")}catch(e){var over_sb=0}over_sb?that!==document.activeElement&&setTimeout(function(){that.focus()},20):(that.last_val=that.value,that.sc.style.display="none",setTimeout(function(){that.sc.style.display="none"},350))},addEvent(that,"blur",that.blurHandler);var suggest=function(data){var val=that.value;if(that.cache[val]=data,data.length&&val.length>=o.minChars){for(var s="",i=0;i<data.length;i++)s+=o.renderItem(data[i],val);that.sc.innerHTML=s,that.updateSC(0)}else that.sc.style.display="none"};that.keydownHandler=function(e){var key=window.event?e.keyCode:e.which;if((40==key||38==key)&&that.sc.innerHTML){var next,sel=that.sc.querySelector(".autocomplete-suggestion.selected");return sel?(next=40==key?sel.nextSibling:sel.previousSibling,next?(sel.className=sel.className.replace("selected",""),next.className+=" selected",that.value=next.getAttribute("data-val")):(sel.className=sel.className.replace("selected",""),that.value=that.last_val,next=0)):(next=40==key?that.sc.querySelector(".autocomplete-suggestion"):that.sc.childNodes[that.sc.childNodes.length-1],next.className+=" selected",that.value=next.getAttribute("data-val")),that.updateSC(0,next),!1}if(27==key)that.value=that.last_val,that.sc.style.display="none";else if(13==key||9==key){var sel=that.sc.querySelector(".autocomplete-suggestion.selected");sel&&"none"!=that.sc.style.display&&(o.onSelect(e,sel.getAttribute("data-val"),sel),setTimeout(function(){that.sc.style.display="none"},20))}},addEvent(that,"keydown",that.keydownHandler),that.keyupHandler=function(e){var key=window.event?e.keyCode:e.which;if(!key||(35>key||key>40)&&13!=key&&27!=key){var val=that.value;if(val.length>=o.minChars){if(val!=that.last_val){if(that.last_val=val,clearTimeout(that.timer),o.cache){if(val in that.cache)return suggest(that.cache[val]),void 0;for(var i=1;i<val.length-o.minChars;i++){var part=val.slice(0,val.length-i);if(part in that.cache&&!that.cache[part].length)return suggest([]),void 0}}that.timer=setTimeout(function(){o.source(val,suggest)},o.delay)}}else that.last_val=val,that.sc.style.display="none"}},addEvent(that,"keyup",that.keyupHandler),that.focusHandler=function(e){that.last_val="\n",that.keyupHandler(e)},o.minChars||addEvent(that,"focus",that.focusHandler)}this.destroy=function(){for(var i=0;i<elems.length;i++){var that=elems[i];removeEvent(window,"resize",that.updateSC),removeEvent(that,"blur",that.blurHandler),removeEvent(that,"focus",that.focusHandler),removeEvent(that,"keydown",that.keydownHandler),removeEvent(that,"keyup",that.keyupHandler),that.autocompleteAttr?that.setAttribute("autocomplete",that.autocompleteAttr):that.removeAttribute("autocomplete"),document.body.removeChild(that.sc),that=null}}}}this.summonWidget.addClass("Autocomplete",Autocomplete)}.call(this),function(){var Externals,bind=function(fn,me){return function(){return fn.apply(me,arguments)}};Externals=function(){function Externals(window,config){this.window=window,this.config=null!=config?config:{},this.cancelJsonp=bind(this.cancelJsonp,this),this.counter=0,this.head=document.getElementsByTagName("head")[0]}return Externals.prototype.load=function(url,pfnError){var done,errorHandler,script;return script=document.createElement("script"),done=!1,script.src=url,script.async=!0,errorHandler=pfnError||this.config.error,"function"==typeof errorHandler&&(script.onerror=function(ex){return errorHandler({url:url,event:ex})}),script.onload=script.onreadystatechange=function(){return done||this.readyState&&"loaded"!==this.readyState&&"complete"!==this.readyState||(done=!0,script.onload=script.onreadystatechange=null,!script||!script.parentNode)?void 0:script.parentNode.removeChild(script)},this.head.appendChild(script)},Externals.prototype.jsonp=function(url,params,callback,callbackName){var query,uniqueName;return null==params&&(params={}),query=-1===(url||"").indexOf("?")?"?":"&",callbackName=callbackName||this.config.callbackName||"callback",uniqueName=callbackName+"_json"+ ++this.counter,params[callbackName]=uniqueName,query+=this.objToQ(params),this.window[uniqueName]=function(_this){return function(data){var e;callback(data);try{delete _this.window[uniqueName]}catch(error){e=error}return _this.window[uniqueName]=null}}(this),this.load(url+query),uniqueName},Externals.prototype.cancelJsonp=function(uniqueName){return this.window[uniqueName]?this.window[uniqueName]=function(){var e;try{delete this.window[uniqueName]}catch(error){e=error}return this.window[uniqueName]=null}:void 0},Externals.prototype.addStylesheet=function(url,id,params){var stylesheet;return null==params&&(params={}),document.getElementById(id)?void 0:(stylesheet=document.createElement("link"),stylesheet.setAttribute("id",id+"style"),stylesheet.setAttribute("rel","stylesheet"),stylesheet.setAttribute("href",url+this.objToQ(params)),this.head.appendChild(stylesheet))},Externals.prototype.encode=function(str){return encodeURIComponent(str)},Externals.prototype.objToQ=function(obj,arrayMark,arraySeparator,includeEmpties){var i,j,key,keys,len,len1,str,val,value;if(null==arrayMark&&(arrayMark=!0),null==arraySeparator&&(arraySeparator=!1),null==includeEmpties&&(includeEmpties=!1),"object"!=typeof obj||!Object.keys(obj).length)return"";for(keys=Object.keys(obj),str=[],i=0,len=keys.length;len>i;i++)if(key=keys[i],value=obj[key],includeEmpties||value&&0!==value.length)if(value instanceof Array)if(arraySeparator)str.push(this.encode(key)+"="+this.encode(value.join(arraySeparator)));else for(j=0,len1=value.length;len1>j;j++)val=value[j],str.push(this.encode(key+(arrayMark?"[]":""))+"="+this.encode(val));else str.push(this.encode(key)+"="+this.encode(value));return str.join("&")},Externals}(),this.summonWidget.addClass("Externals",Externals)}.call(this),function(){var LegacyParamConverter,bind=function(fn,me){return function(){return fn.apply(me,arguments)}};LegacyParamConverter=function(){function LegacyParamConverter(params){this.setParams=bind(this.setParams,this);var search;return search=summonWidget.Externals.prototype.objToQ(params,!1),this.search=search.replace(/\+/g," "),this.legacyParamRx=/s\.\w+(%5B%5D|\[\])?=([^&]*)/g,this.cleanParamRx=/s\.(\w+)(%5B%5D|\[\])?/,this.params={},this.search&&this.setParams(this.legacyParamRx),this.params}return LegacyParamConverter.prototype.setParams=function(regex){var base,f,i,j,key,len,len1,pairs,ref,ref1;if(pairs=this.search.match(regex)){for(pairs.forEach(function(_this){return function(pair){var base,key,rawKey;return rawKey=pair.split("=",1)[0],key=rawKey.replace(_this.cleanParamRx,"$1"),(base=_this.params)[key]||(base[key]=[]),_this.params[key].push(decodeURIComponent(pair.substring(rawKey.length+1)))}}(this)),ref=["ff","rff","keep_r","spellcheck","fvgf","pn","ps","role","max","light"],i=0,len=ref.length;len>i;i++)key=ref[i],null!=this.params[key]&&delete this.params[key];if(this.params.fq){for(ref1=this.params.fq,j=0,len1=ref1.length;len1>j;j++)if(f=ref1[j],/SourceType.*Library\ Catalog/.test(f)){(base=this.params).fvf||(base.fvf=[]),this.params.fvf.push("SourceType,Library Catalog,f");break}delete this.params.fq}return this.params.fvf?this.params.fvf=this.params.fvf.map(function(f){return/,(t|f)$/.test(f)?f:f+",f"}):void 0}},LegacyParamConverter}(),this.summonWidget.addClass("LegacyParamConverter",LegacyParamConverter)}.call(this),function(){var SummonCustomSearchBox;SummonCustomSearchBox=function(){function SummonCustomSearchBox(options){var ref,ref1,scriptTag;"#"===options.id[0]&&(options.id=options.id.slice(1)),options.params=options.params&&Object.keys(options.params).length&&new summonWidget.LegacyParamConverter(options.params)||{pn:1,ho:"1"},options.style={tagline:(null!=(ref=options.colors)?ref.tagline:void 0)||"#000",links:(null!=(ref1=options.colors)?ref1.tagline:void 0)||"#000"},null!=options.boxwidth_text&&(options.style.boxwidth_text=options.boxwidth_text),options.colors&&delete options.colors,scriptTag=document.getElementById(options.id),options.endpoint=scriptTag.getAttribute("src").replace("http?","").replace("/widgets/box.js",""),summonWidget.box(options)}return SummonCustomSearchBox}(),this.SummonCustomSearchBox=SummonCustomSearchBox}.call(this),function(){var Box,bind=function(fn,me){return function(){return fn.apply(me,arguments)}};Box=function(){function Box(options,customElement){var maquette;this.options=options,this.customElement=null!=customElement?customElement:"summonBoxContainer",this.submitForm=bind(this.submitForm,this),this.getParams=bind(this.getParams,this),this.renderBox=bind(this.renderBox,this),this.caller=bind(this.caller,this),this.setStyleSheet=bind(this.setStyleSheet,this),this.run=bind(this.run,this),maquette=new summonWidget.Maquette,this.h=maquette.h,this.projector=maquette.projector,this.doc=document,this.startImmediately=!1,this.searchFormSelector="summonBoxForm"+this.options.id,this.searchTermSelector="summonSearchTerm"+this.options.id,this.submissionFormSelector="summonSubmissionForm"+this.options.id,this.e=new summonWidget.Externals(window),"summonBoxContainer"===this.customElement&&(this.startImmediately=!0,this.customElement+=this.options.id,this.doc.write('<div id="'+this.customElement+'"></div>'),this.run())}return Box.prototype.run=function(){return this.setStyleSheet(),this.startImmediately?null!=this.doc.addEventListener?this.doc.addEventListener("DOMContentLoaded",this.caller):window.attachEvent("onload",this.caller):this.caller()},Box.prototype.setStyleSheet=function(){return this.e.addStylesheet(this.options.endpoint+("/widgets/box.css?id="+this.options.id+"&"),this.options.id+"style",this.options.style)},Box.prototype.caller=function(){return this.projector.append(this.doc.getElementById(this.customElement),this.renderBox),this.options.suggest?setTimeout(function(_this){return function(){return new summonWidget.Autocomplete({id:_this.options.id,selector:"#"+_this.searchTermSelector,minChars:3,source:function(q,suggest){return _this.uniqueCallback&&_this.e.cancelJsonp(_this.uniqueCallback),_this.uniqueCallback=_this.e.jsonp(_this.options.endpoint+"/metadata/suggest/suggest?",_this.autoCompleteParams(q),function(res){var ref,suggestions;return suggestions=null!=(null!=res?null!=(ref=res.result)?ref.length:void 0:void 0)?res.result.map(function(s){return s.name}):[],suggest(suggestions)})}})}}(this),500):void 0},Box.prototype.autoCompleteParams=function(q){return{prefix:q,type:["/time/event","/event","/base/newsevents/news_reported_event","/base/argumentmaps/morally_disputed_activity","/book/book_subject","/education/field_of_study","/location","/education/academic","/common/topic/subject_of","/medicine","/base/argumentmaps"],type_strict:"should",all_types:!1}},Box.prototype.renderBox=function(){return this.h("div#"+this.options.id,[this.h("form.summon-search-widget#"+this.searchFormSelector,{method:"get",name:this.searchFormSelector,onsubmit:this.submitForm},[this.options.tagline?this.h("div.summon-search-tagline",{styles:{color:this.options.style.tagline}},this.options.tagline_text):[],this.h("div.summon-search-box",{innerHTML:'<label class="sr-only" for="'+this.searchTermSelector+'">'+this.options.searchbutton_text+('</label><input id="'+this.searchTermSelector+'" type="text" class="summon-search-field" name="q" autocomplete="off" placeholder="')+(this.options.placeholder_text||"")+'"'+(null!=this.options.style.boxwidth_text?' style="width:'+this.options.style.boxwidth_text+'px"':"")+" />"+'<button type="submit" class="summon-search-submit '+(this.options.style_button||"")+'" >'+this.options.searchbutton_text+"</button>"}),this.options.advanced?this.h("a",{href:this.options.endpoint+"/#!/advanced",target:this.options.popup?"_blank":"_self",styles:{color:this.options.style.links}},this.options.advanced_text):[]]),this.options.popup?this.h("form#"+this.submissionFormSelector,{method:"get","accept-charset":"utf-8",target:"_blank"}):""])},Box.prototype.getParams=function(q){var params;return params=JSON.parse(JSON.stringify(this.options.params)),params.q=q||this.q(),params.ho=params.ho?"t":"f",params},Box.prototype.q=function(){return this.doc.getElementById(this.searchFormSelector).q.value},Box.prototype.submitForm=function(event){var action,form,queryString;return(null!=event?event.preventDefault:void 0)&&event.preventDefault(),queryString=this.e.objToQ(this.getParams(),!1,"|"),action=this.options.endpoint+"/#!/search?"+queryString,this.options.popup?(form=this.doc.getElementById(this.submissionFormSelector),form.action=action,form.submit()):window.location.href=action,!1},Box}(),this.summonWidget.addClass("Box",Box)}.call(this),function(){}.call(this);</script><script type="text/javascript" defer>summonWidget.box({"id":"sd7cca99ed8f2375a864e978a1fafe85","endpoint":"//colby.summon.serialssolutions.com","style":{"tagline":"#ffffff","links":"#ffa500","boxwidth_text":null},"params":{"pn":1,"ho":true,"myinst":"","jt":"","l":"en"},"tagline_text":"Type keywords below and click \"Search\"","searchbutton_text":"Search &gt;","advanced_text":"Advanced Search: Filters, formats and more","placeholder_text":"Type keywords here...","advanced":true,"suggest":true,"tagline":false,"popup":false})</script>
<?php else : ?>

<form class=option1
    id=search-cbbcat
    name=search-cbbcat
    action=https://colby.summon.serialssolutions.com/search
    class=summon-search-widget
    accept-charset=utf-8
    id=sb1a9a060f7150131756b2ae8d1b2df50>
  <input name=utf8 type=hidden value=✓>
  <input type=text
       placeholder="<?php echo $colby_libraries->placeholder_text; ?>"
       class=summon-search-field
       name=s.q
       autocomplete=off>
  <input type=submit value="Search >">
  <input type=hidden name=s.fvf[] value="ContentType,Newspaper Article,t">
  <input type=hidden name=keep_r value=true>
  <a href=https://colby.summon.serialssolutions.com/advanced>More search options ></a>
</form>
<?php endif; ?>

<div class=bottom-text>
  <strong>What's this?</strong>
  <p>Articles, books, audio, video, images and more.
  <p><a href=https://libguides.colby.edu/onesearch_help>
    Help with OneSearch
  </a>
  <?php if (is_plugin_active('colby-onesearch/colby-onesearch.php') && ! $_GET['summon-search'] ) : ?>

<!--   <p><a href="https://www.cbbnet.org/new-books-and-media/">
    CBB New Books and Media
      </a></p> -->
  <?php elseif (is_plugin_active('colby-onesearch/colby-onesearch.php') ) : ?>

  <p><a href=?>
    OneSearch 2.0
      </a></p>
  <?php endif; ?>

</div>
