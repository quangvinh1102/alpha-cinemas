import{_ as d,z as m,g as r,o as f,c as p,f as e,i as _,p as n,v as i,B as h,l as b,q as g,x as u}from"./app-0cc19bc4.js";const x={setup(){const a=m(),o=r({email:"",password:"",remmeber:!1});return{admin:o,login:async()=>{console.log(o),b.post("api/admin/login",o).then(t=>{console.log(t),t.status==200&&t.data.status_code==200&&(localStorage.setItem("admin_token",JSON.stringify(t.data.access_token)),a.push({name:"admin-home"}))})}}}},s=a=>(g("data-v-77f841f7"),a=a(),u(),a),v={class:"vh-100"},w={class:"container-fluid h-custom"},y={class:"row d-flex justify-content-center align-items-center h-100"},k=s(()=>e("div",{class:"col-md-9 col-lg-6 col-xl-5"},[e("img",{src:"https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp",class:"img-fluid",alt:"Sample image"})],-1)),S={class:"col-md-8 col-lg-6 col-xl-4 offset-xl-1"},E=["form"],I=s(()=>e("div",{class:"d-flex flex-row align-items-center justify-content-center mb-3"},[e("p",{class:"lead fw-normal mb-0 me-3"},"Đăng Nhập")],-1)),M={class:"form-outline mb-4"},N=s(()=>e("label",{class:"form-label",for:"form3Example3"},"Email",-1)),j={class:"form-outline mb-3"},B=s(()=>e("label",{class:"form-label",for:"form3Example4"},"Mật khẩu",-1)),V={class:"d-flex justify-content-between align-items-center"},U={class:"form-check mb-0"},L=s(()=>e("label",{class:"form-check-label",for:"form2Example3"}," Ghi nhớ ",-1)),q=s(()=>e("a",{href:"#!",class:"text-body"},"Quên mật khẩu?",-1)),z=s(()=>e("div",{class:"text-center text-lg-start mt-4 pt-2"},[e("button",{type:"submit",class:"btn btn-primary btn-lg",style:{"padding-left":"2.5rem","padding-right":"2.5rem"}},"Đăng nhập")],-1)),C=s(()=>e("div",{class:"d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary"},[e("div",{class:"text-white mb-3 mb-md-0"}," Mario @ 2023 - alpha cinemas. ")],-1));function D(a,o,c,t,G,J){return f(),p("section",v,[e("div",w,[e("div",y,[k,e("div",S,[e("form",{onSubmit:o[3]||(o[3]=_((...l)=>t.login&&t.login(...l),["prevent"])),form:t.admin},[I,e("div",M,[n(e("input",{type:"email",id:"email",class:"form-control form-control-lg",placeholder:"Nhập email","onUpdate:modelValue":o[0]||(o[0]=l=>t.admin.email=l)},null,512),[[i,t.admin.email]]),N]),e("div",j,[n(e("input",{type:"password",id:"password",class:"form-control form-control-lg",placeholder:"Nhập mật khẩu","onUpdate:modelValue":o[1]||(o[1]=l=>t.admin.password=l)},null,512),[[i,t.admin.password]]),B]),e("div",V,[e("div",U,[n(e("input",{class:"form-check-input me-2",type:"checkbox","onUpdate:modelValue":o[2]||(o[2]=l=>t.admin.remmeber=l),id:"remmeber"},null,512),[[h,t.admin.remmeber]]),L]),q]),z],40,E)])])]),C])}const P=d(x,[["render",D],["__scopeId","data-v-77f841f7"]]);export{P as default};