import{_ as U,u as C,e as x,g as S,r,o as d,c,a as n,w as v,i as L,l as f,h as M,f as e,t as m,j as _,k as N}from"./app-0cc19bc4.js";import{u as j}from"./use-menu-f94f9720.js";import{C as I}from"./helper-35d4951d.js";const V={setup(){const g=C();j().onSelectKeys(["admin-movies"]);const h=x([{}]),t=x([{uid:"1",name:"anh-bia.jpg",status:"done",url:"",thumbUrl:""}]),u=x({}),o=S({name:"",slug:"",file:null,descrition:"",release_date:"",categories:[],director:"",running_time:""}),p=s=>{o.file=s},b=s=>{o.slug=I(s.target.value)};return(async()=>{f.get(`/api/movie/${g.params.id}/edit`).then(s=>{console.log(s),o.name=s.data.name,o.slug=s.data.slug,o.descrition=s.data.descrition,o.release_date=M(s.data.release_date),o.director=s.data.director,o.running_time=s.data.running_time,t.value[0].url=s.data.img,t.value[0].thumbUrl=s.data.img,s.data.categories.forEach(i=>{o.categories.push({label:i.name,value:i.id})}),console.log(o)}).catch(s=>{console.log(s)})})(),(async()=>{f.get("api/movie/create").then(s=>{h.value=s.data})})(),{movie:o,errors:u,fileList:t,options:h,updateSlug:b,update:async()=>{const s=new FormData;s.append("name",o.name),s.append("slug",o.slug),s.append("file",o.file),s.append("descrition",o.descrition),s.append("release_date",o.release_date),s.append("categories",JSON.stringify(o.categories)),s.append("director",o.director),s.append("running_time",o.running_time),s.append("_method","put"),console.log(o),f.post(`/api/movie/${g.params.id}`,s).then(i=>{i.status==200&&(history.back(-1),u.value=""),console.log(i)}).catch(i=>{i.response.status===422&&(u.value=i.response.data.errors),console.log(u)})},uploadImage:p}}},B=["form"],D={class:"row"},E={class:"col-12 col-sm-8"},F={class:"row mb-3"},J=e("div",{class:"col-12 col-sm-3 text-start text-sm-end mb-1"},[e("label",null,[e("span",{class:"text-danger me-1"},"*"),e("span",null,"Tên phim: ")])],-1),K={class:"col-12 col-sm-5"},O={key:0,class:"text-danger"},R={class:"row mb-3"},q=e("div",{class:"col-12 col-sm-3 text-start text-sm-end mb-1"},[e("label",null,[e("span",{class:"text-danger me-1"},"*"),e("span",null,"Slug phim: ")])],-1),z={class:"col-12 col-sm-5"},A={key:0,class:"text-danger"},G={class:"row mb-3"},H=e("div",{class:"col-12 col-sm-3 text-start text-sm-end mb-1"},[e("label",null,[e("span",{class:"text-danger me-1"},"*"),e("span",null,"Mô tả: ")])],-1),P={class:"col-12 col-sm-5"},Q={key:0,class:"text-danger"},W={class:"row mb-3"},X=e("div",{class:"col-12 col-sm-3 text-start text-sm-end mb-1"},[e("label",null,[e("span",{class:"text-danger me-1"},"*"),e("span",null,"Ngày phát hành: ")])],-1),Y={class:"col-12 col-sm-5"},Z={key:0,class:"text-danger"},$={class:"row mb-3"},ee=e("div",{class:"col-12 col-sm-3 text-start text-sm-end mb-1"},[e("label",null,[e("span",{class:"text-danger me-1"},"*"),e("span",null,"Thể loại: ")])],-1),te={class:"col-12 col-sm-5"},se={class:"row mb-3"},oe=e("div",{class:"col-12 col-sm-3 text-start text-sm-end mb-1"},[e("label",null,[e("span",{class:"text-danger me-1"},"*"),e("span",null,"Tác giả: ")])],-1),ae={class:"col-12 col-sm-5"},le={key:0,class:"text-danger"},ne={class:"row mb-3"},ie=e("div",{class:"col-12 col-sm-3 text-start text-sm-end mb-1"},[e("label",null,[e("span",{class:"text-danger me-1"},"*"),e("span",null,"Thời lượng: ")])],-1),re={class:"col-12 col-sm-5"},de=e("span",null," (min)",-1),ce={key:0,class:"text-danger"},me={class:"row mb-3"},_e=e("div",{class:"col-12 col-sm-3 text-start text-sm-end mb-1"},[e("label",null,[e("span",{class:"text-danger me-1"},"*"),e("span",null,"Ảnh bìa phim: ")])],-1),ue={class:"col-12 col-sm-5"},pe=e("i",{class:"fa-solid fa-upload"},null,-1),ve=e("span",{class:"ms-2"},"Chọn ảnh",-1),ge={key:0,class:"text-danger"},he={class:"row"},be={class:"col-12 d-grid d-sm-flex justify-content-sm-end mx-auto"},xe=e("span",null,"Lưu",-1);function fe(g,l,h,t,u,o){const p=r("a-input"),b=r("a-textarea"),y=r("a-date-picker"),w=r("a-select"),k=r("a-input-number"),s=r("a-button"),i=r("a-upload"),T=r("a-card");return d(),c("form",{onSubmit:l[8]||(l[8]=L((...a)=>t.update&&t.update(...a),["prevent"])),form:t.movie},[n(T,{title:"Thêm phim mới",style:{width:"100%"}},{default:v(()=>[e("div",D,[e("div",E,[e("div",F,[J,e("div",K,[n(p,{placeholder:"Tên danh mục",value:t.movie.name,"onUpdate:value":l[0]||(l[0]=a=>t.movie.name=a),onInput:t.updateSlug,"allow-clear":""},null,8,["value","onInput"]),t.errors.name?(d(),c("span",O,m(t.errors.name[0]),1)):_("",!0)])]),e("div",R,[q,e("div",z,[n(p,{placeholder:"slug",value:t.movie.slug,"onUpdate:value":l[1]||(l[1]=a=>t.movie.slug=a),"allow-clear":""},null,8,["value"]),t.errors.slug?(d(),c("span",A,m(t.errors.slug[0]),1)):_("",!0)])]),e("div",G,[H,e("div",P,[n(b,{value:t.movie.descrition,"onUpdate:value":l[2]||(l[2]=a=>t.movie.descrition=a),placeholder:"Mô tả",rows:4},null,8,["value"]),t.errors.descrition?(d(),c("span",Q,m(t.errors.descrition[0]),1)):_("",!0)])]),e("div",W,[X,e("div",Y,[n(y,{value:t.movie.release_date,"onUpdate:value":l[3]||(l[3]=a=>t.movie.release_date=a)},null,8,["value"]),t.errors.release_date?(d(),c("span",Z,m(t.errors.release_date[0]),1)):_("",!0)])]),e("div",$,[ee,e("div",te,[n(w,{value:t.movie.categories,"onUpdate:value":l[4]||(l[4]=a=>t.movie.categories=a),mode:"multiple",placeholder:"Chọn thể loại",style:{width:"100%"},options:t.options.map(a=>({value:a.id,label:a.name}))},null,8,["value","options"])])]),e("div",se,[oe,e("div",ae,[n(p,{placeholder:"Tên tác giả",value:t.movie.director,"onUpdate:value":l[5]||(l[5]=a=>t.movie.director=a),"allow-clear":""},null,8,["value"]),t.errors.director?(d(),c("span",le,m(t.errors.director[0]),1)):_("",!0)])]),e("div",ne,[ie,e("div",re,[n(k,{placeholder:"Thời lượng ",value:t.movie.running_time,"onUpdate:value":l[6]||(l[6]=a=>t.movie.running_time=a),min:"0"},null,8,["value"]),N(),de,t.errors.running_time?(d(),c("span",ce,m(t.errors.running_time[0]),1)):_("",!0)])]),e("div",me,[_e,e("div",ue,[n(i,{"file-list":t.fileList,"onUpdate:fileList":l[7]||(l[7]=a=>t.fileList=a),"list-type":"picture","max-count":1,action:"","before-upload":t.uploadImage},{default:v(()=>[n(s,{"html-type":"button"},{default:v(()=>[pe,ve]),_:1})]),_:1},8,["file-list","before-upload"]),t.errors.running_time?(d(),c("span",ge,m(t.errors.running_time[0]),1)):_("",!0)])])])]),e("div",he,[e("div",be,[n(s,{type:"primary","html-type":"submit",class:"me-0 me-sm-3 mb-3 mb-sm-0"},{default:v(()=>[xe]),_:1})])])]),_:1})],40,B)}const Te=U(V,[["render",fe]]);export{Te as default};
