import{_ as x,n as v,e as I,r as i,o as e,d as l,w as c,l as N,c as s,t as m,j as a,F as C,a as b,f as w}from"./app-0cc19bc4.js";import{u as B}from"./use-menu-f94f9720.js";import{f as D}from"./helper-35d4951d.js";const $=v({setup(){B().onSelectKeys(["admin"]);const r=I([]),_=[{title:"#",key:"index",width:100,sorter:(t,p)=>t.index-p.index},{title:"Ảnh ",dataIndex:"avatar",key:"avatar"},{title:"Họ và tên",dataIndex:"fullname",key:"fullname"},{title:"Email",dataIndex:"email",key:"email"},{title:"Điện thoại",dataIndex:"phone",key:"phone"},{title:"Giới tính",dataIndex:"gender",key:"gender"},{title:"Ngày tạo",dataIndex:"created_at",key:"created_at"},{title:"Ngày sửa",dataIndex:"updated_at",key:"updated_at"},{title:"Công cụ",key:"action",fixed:"right",width:200}];return(()=>N.get("/api/admin/index").then(t=>{r.value=t.data,console.log(t)}).catch(t=>{console.log(t)}))(),{admin:r,columns:_,formartDateTime:D}}}),A={key:0},T={key:0,class:"text-primary"},V={key:1,class:"text-danger"},E={key:3},F={key:4},S=w("i",{class:"fa-solid fa-pen-to-square"},null,-1);function j(d,r,_,u,t,p){const y=i("a-image"),k=i("a-button"),f=i("router-link"),g=i("a-table");return e(),l(g,{columns:d.columns,"data-source":d.admin,scroll:{x:576}},{bodyCell:c(({column:n,index:h,record:o})=>[n.key==="index"?(e(),s("span",A,m(h+1),1)):a("",!0),n.key==="avatar"?(e(),l(y,{key:1,width:70,src:o.avatar},null,8,["src"])):a("",!0),n.key==="gender"?(e(),s(C,{key:2},[o.gender==0?(e(),s("span",T,"Nam")):o.gender==1?(e(),s("span",V,"Nữ")):a("",!0)],64)):a("",!0),n.key==="updated_at"?(e(),s("span",E,m(d.formartDateTime(o.updated_at)),1)):a("",!0),n.key==="created_at"?(e(),s("span",F,m(d.formartDateTime(o.created_at)),1)):a("",!0),n.key==="action"?(e(),l(f,{key:5,to:{name:"admin-edit",params:{id:o.id}}},{default:c(()=>[b(k,{type:"primary"},{default:c(()=>[S]),_:1})]),_:2},1032,["to"])):a("",!0)]),_:1},8,["columns","data-source"])}const K=x($,[["render",j]]);export{K as default};
