import{d as o}from"./Caret.DMa7g0j7.js";import{_ as a}from"./_plugin-vue_export-helper.BN1snXvA.js";import{o as i,c,b as u}from"./runtime-dom.esm-bundler.DKw-RQqs.js";const h={emits:["can-show","images"],props:{src:String,tag:{type:String,default(){return"img"}},debounce:{type:Boolean,default(){return!0}}},data(){return{canShow:!1,images:{}}},watch:{src(){if(this.debounce){o(this.maybeShowImage,50);return}this.maybeShowImage()},canShow(t){this.$emit("can-show",t)},images:{handler:function(){this.$emit("images",this.images)},deep:!0}},methods:{async maybeShowImage(){if(this.canShow=!1,!this.src)return;if(this.images[this.src]){this.canShow=!0;return}const t=new Image;t.onload=await(()=>{this.canShow=!0;let s=0;const e=t.width,n=t.height;e&&n&&(s=e/n),!this.images[this.src]&&(this.images[this.src]={image:t,ratio:s,vertical:e>n})}),t.onerror=await(()=>{this.canShow=!1}),t.src=this.src}},mounted(){this.maybeShowImage()}},m=["src"];function l(t,s,e,n,r,f){return r.canShow?(i(),c("img",{key:0,src:e.src},null,8,m)):u("",!0)}const w=a(h,[["render",l]]);export{w as B};
