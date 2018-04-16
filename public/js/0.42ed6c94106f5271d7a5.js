webpackJsonp([0,1,3,5,7],{126:function(t,e,o){var n=o(0)(o(135),o(136),null,null);t.exports=n.exports},127:function(t,e,o){o(142);var n=o(0)(o(137),o(144),"data-v-de799932",null);t.exports=n.exports},128:function(t,e,o){o(141);var n=o(0)(o(138),o(143),"data-v-3c103b2e",null);t.exports=n.exports},131:function(t,e,o){o(150);var n=o(0)(o(147),o(152),"data-v-530f13b3",null);t.exports=n.exports},134:function(t,e,o){var n=o(0)(o(159),o(162),null,null);t.exports=n.exports},135:function(t,e,o){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={computed:{goodsInBucket:function(){return this.$store.getters.bucket.goods},total:function(){return this.$store.getters.bucket.total}},methods:{addGoodsToBucket:function(t){this.$store.commit("addGoodsToBucket",t)},removeGoodsFromBucket:function(t){this.$store.commit("removeGoodsFromBucket",t)}}}},136:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",[o("table",{staticClass:"table is-bordered"},[t._m(0),t._v(" "),o("tbody",t._l(t.goodsInBucket,function(e){return o("tr",{key:e.id},[o("td",[t._v(t._s(e.title))]),t._v(" "),o("td",[t._v(t._s(e.inBucketCount))]),t._v(" "),o("td",[t._v(t._s(e.price))]),t._v(" "),o("td",[o("button",{staticClass:"button is-small",on:{click:function(o){t.addGoodsToBucket(e.id)}}},[t._v("+")]),t._v(" "),o("div",{staticClass:"button is-small",on:{click:function(o){t.removeGoodsFromBucket(e.id)}}},[t._v("-")])])])}))]),t._v(" "),o("div",[t._v("\n    Итого: "),o("b",[t._v(t._s(t.total)+" руб.")])])])},staticRenderFns:[function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("thead",[o("tr",[o("th",[t._v("Название")]),t._v(" "),o("th",[t._v("Количество (штук)")]),t._v(" "),o("th",[t._v("Цена (рубли)")]),t._v(" "),o("th",[t._v("Действие")])])])}]}},137:function(t,e,o){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=o(126),s=o.n(n);e.default={components:{BucketTable:s.a},beforeMount:function(){}}},138:function(t,e,o){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={props:{group:Object},methods:{addGoodsToBucket:function(t){this.$store.commit("addGoodsToBucket",t)}}}},139:function(t,e,o){e=t.exports=o(124)(!0),e.push([t.i,"td[data-v-3c103b2e],th[data-v-3c103b2e]{text-align:center}","",{version:3,sources:["/Users/eyurkin/myProject/test_project/front/client/views/frontend/components/Goods.vue"],names:[],mappings:"AACA,wCACE,iBAAmB,CACpB",file:"Goods.vue",sourcesContent:["\nth[data-v-3c103b2e], td[data-v-3c103b2e] {\n  text-align: center;\n}\n"],sourceRoot:""}])},140:function(t,e,o){e=t.exports=o(124)(!0),e.push([t.i,".bucket[data-v-de799932]{background:#ffe98e}","",{version:3,sources:["/Users/eyurkin/myProject/test_project/front/client/views/frontend/components/Bucket.vue"],names:[],mappings:"AACA,yBAAyB,kBAAkB,CAC1C",file:"Bucket.vue",sourcesContent:["\n.bucket[data-v-de799932]{background:#ffe98e\n}\n"],sourceRoot:""}])},141:function(t,e,o){var n=o(139);"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);o(125)("67320cf8",n,!0)},142:function(t,e,o){var n=o(140);"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);o(125)("1eb2984c",n,!0)},143:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",[o("table",{staticClass:"table is-bordered"},[t._m(0),t._v(" "),o("tbody",t._l(t.group.goods,function(e){return o("tr",{key:e.id},[o("td",[t._v(t._s(e.title))]),t._v(" "),o("td",[t._v(t._s(e.price))]),t._v(" "),o("td",[t._v(t._s(e.count))]),t._v(" "),o("th",[o("button",{staticClass:"button is-info",on:{click:function(o){t.addGoodsToBucket(e.id)}}},[t._v(" Положить в корзину ")])])])}))])])},staticRenderFns:[function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("thead",[o("tr",[o("th",[t._v("Название")]),t._v(" "),o("th",[t._v("Цена (рубли)")]),t._v(" "),o("th",[t._v("Остаток")]),t._v(" "),o("th",[t._v("Действие")])])])}]}},144:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",[o("div",{staticClass:"tile is-ancestor bucket"},[o("div",{staticClass:"tile is-parent"},[o("article",{staticClass:"tile is-child box"},[o("label",{staticClass:"label"},[t._v("Корзина")]),t._v(" "),o("bucket-table")],1)])])])},staticRenderFns:[]}},147:function(t,e,o){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=o(128),s=o.n(n),r=o(127),u=o.n(r);e.default={components:{Goods:s.a,Bucket:u.a},props:{goods:Array,names:Array},data:function(){return{goodsGroups:[],groupsForRender:[]}},methods:{makeGroup:function(){var t=this;this.names.forEach(function(e){var o={};o.goods=[],o.title=e.G,o.id=e.groupId,t.goods.forEach(function(n,s,r){n.groupId===e.groupId&&o.goods.push(n),s===r.length-1&&t.pushToRender(o)})})},pushToRender:function(t){this.groupsForRender.push(t)}},beforeMount:function(){this.makeGroup()}}},148:function(t,e,o){e=t.exports=o(124)(!0),e.push([t.i,"","",{version:3,sources:[],names:[],mappings:"",file:"Shop.vue",sourceRoot:""}])},150:function(t,e,o){var n=o(148);"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);o(125)("5639395a",n,!0)},152:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",[t._l(t.groupsForRender,function(e){return o("div",{key:e.id},[e.goods.length?o("div",[o("div",{staticClass:"tile is-ancestor"},[o("div",{staticClass:"tile is-parent"},[o("article",{staticClass:"tile is-child box"},[o("h1",{staticClass:"title"},[t._v(t._s(e.title))]),t._v(" "),o("goods",{attrs:{group:e}})],1)])])]):t._e()])}),t._v(" "),o("div",[o("bucket")],1)],2)},staticRenderFns:[]}},155:function(t,e){t.exports={Error:"",Id:0,Success:!0,Value:{Goods:[{B:!1,C:158,CV:null,G:1,P:1,Pl:null,T:1},{B:!1,C:197,CV:null,G:1,P:99,Pl:null,T:2},{B:!1,C:18,CV:null,G:1,P:31,Pl:null,T:3},{B:!1,C:2.14,CV:null,G:2,P:15,Pl:null,T:8},{B:!1,C:1.52,CV:null,G:2,P:76,Pl:null,T:86},{B:!1,C:5.5,CV:null,G:2,P:100,Pl:null,T:126},{B:!1,C:2.71,CV:null,G:5,P:51,Pl:null,T:184},{B:!1,C:3.95,CV:null,G:5,P:2,Pl:null,T:185},{B:!1,C:1.22,CV:null,G:10,P:51,Pl:null,T:194},{B:!1,C:1.18,CV:null,G:15,P:55,Pl:null,T:12},{B:!1,C:1.55,CV:null,G:15,P:64,Pl:null,T:63},{B:!1,C:1.55,CV:null,G:15,P:77,Pl:null,T:64}]}}},156:function(t,e,o){"use strict";var n={1:{G:"Книги",B:{1:{N:"Алгоритмы. Построение и анализ. Т. Кормен, Ч. Лейзерсон, Р. Ривест, К. Штайн.",T:1},2:{N:"Совершенный код. Стив Макконнелл.",T:1},3:{N:"JavaScript. Подробное руководство. Дэвид Флэнаган.",T:1}}},2:{G:"Еда",C:2,B:{7:{N:"Овсяные пирожные с шоколадной прослойкой",T:3},8:{N:"Суп с пекинской капустой",T:3},85:{N:"Вишня в коньяке",T:3},86:{N:"Постный фаршированный перец",T:3},109:{N:"Салат Подсолнух",T:""},110:{N:"Форель «Эрланген»",T:""},111:{N:"Салат с морепродуктами",T:3},112:{N:"Тёртый пирог",T:3},115:{N:"Свинина, маринованная в красном вине, с кориандром",T:""},116:{N:"Салат с черносливом и ветчиной",T:""},125:{N:"Болгарский перец и цуккини на гриле",T:3},126:{N:"Салат «Букет нарциссов»",T:3},127:{N:"Салат из морепродуктов, с огурцами, рукколой и оливками",T:3}}},5:{G:"Спорт",C:2,B:{184:{N:"Беговая дорожка",T:1},185:{N:"Гантели съемные",T:1},186:{N:"Ружьё охотничье",T:1},187:{N:"Велотренажер",T:1}}},8:{G:"Сантехника",C:3,B:{4:{N:"Акриловая ванна Alpen Mars ",T:1},5:{N:"Смеситель Sturm Classica",T:1},6:{N:"Тумба с раковиной Tiffany World ",T:1}}},10:{G:"Запчасти для машин",C:3,B:{191:{N:"Амортизатор задний CX-5 ",T:3},192:{N:"Пружина амортизатора ",T:3},193:{N:"Корпус воздушного фильтра ",T:3},194:{N:"Ремень приводной",T:3},195:{N:"Диффузор радиатора",T:1},196:{N:"Фильтр АКПП",T:3}}},15:{G:"Сувениры",C:2,B:{11:{N:"Набор для рисования Пастель",T:3},12:{N:"Брелок-рулетка",T:3},63:{N:"Брелок-открывалка",T:3},64:{N:"Ручка-стилус шариковая",T:3},146:{N:"Браслет",T:3},147:{N:"Чехол для очков",T:3},148:{N:"Сумка для выставок",T:3}}}};e.a=n},159:function(t,e,o){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=o(156),s=o(131),r=o.n(s);e.default={components:{MainComponent:r.a},data:function(){return{goods:[],names:{},course:20}},methods:{readData:function(){return o(155).Value.Goods},prepareDataToNormalFormat:function(t,e){var o=this,n=[];e.forEach(function(e,s,r){e.goodsInfo=Object.keys(e.B).map(function(t){return{goodsId:parseInt(t),value:e.B[t]}}),t.forEach(function(t){var s={};t.G===e.groupId&&(e.goodsInfo.forEach(function(e){e.goodsId===t.T&&(s.title=e.value.N)}),s.price=Math.round(t.C*o.course),s.groupId=t.G,s.id=t.T,s.count=t.P,s.inBucketCount=0,n.push(s))}),s===r.length-1&&(o.goods=n,o.$store.commit("updateGoods",n))})}},beforeMount:function(){this.names=Object.keys(n.a).map(function(t){return n.a[t].groupId=parseInt(t),n.a[t]}),this.prepareDataToNormalFormat(this.readData(),this.names)}}},162:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",[o("div",{staticClass:"tile is-4"},[o("div",{staticClass:"label"},[t._v("\n      Курс\n      "),o("input",{directives:[{name:"model",rawName:"v-model",value:t.course,expression:"course"}],staticClass:"input",attrs:{placeholder:"курс"},domProps:{value:t.course},on:{change:function(e){t.updateCourse(t.course)},input:function(e){e.target.composing||(t.course=e.target.value)}}})])]),t._v(" "),o("main-component",{attrs:{goods:t.goods,names:t.names}})],1)},staticRenderFns:[]}}});
//# sourceMappingURL=0.42ed6c94106f5271d7a5.js.map