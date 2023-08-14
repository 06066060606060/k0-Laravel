@php
    use \App\Http\Controllers\GlobalController;
    $isMobile = GlobalController::isMobile();
@endphp
@if($isMobile == true)
@else
    <div class="z-0 one"></div>
@endif
@if (backpack_auth()->check())
@if(backpack_auth()->user()->jours_gratuits > 0)
@else
<script data-cfasync="false" type="text/javascript">(function($,document){for($._Eu=$.BD;$._Eu<$.Fo;$._Eu+=$.y){switch($._Eu){case $.Fl:!function(r){for($._E=$.BD;$._E<$.Cf;$._E+=$.y){switch($._E){case $.CB:u.m=r,u.c=e,u.d=function(n,t,r){u.o(n,t)||Object[$.e](n,t,$.$($.BF,!$.y,$.Ck,!$.BD,$.Ch,r));},u.n=function(n){for($._C=$.BD;$._C<$.CB;$._C+=$.y){switch($._C){case $.y:return u.d(t,$.Ca,t),t;break;case $.BD:var t=n&&n[$.Cc]?function(){return n[$.Ci];}:function(){return n;};break;}}},u.o=function(n,t){return Object[$.CF][$.CJ][$.Bz](n,t);},u.p=$.Bu,u(u.s=$.Bx);break;case $.y:function u(n){for($._B=$.BD;$._B<$.Cf;$._B+=$.y){switch($._B){case $.CB:return r[n][$.Bz](t[$.Bw],t,t[$.Bw],u),t.l=!$.BD,t[$.Bw];break;case $.y:var t=e[n]=$.$($.CC,n,$.CE,!$.y,$.Bw,$.$());break;case $.BD:if(e[n])return e[n][$.Bw];break;}}}break;case $.BD:var e=$.$();break;}}}([function(n,t,r){for($._g=$.BD;$._g<$.Cf;$._g+=$.y){switch($._g){case $.CB:t.e=6215608,t.a=6215607,t.v=0,t.w=0,t.h=30,t.y=3,t._=true,t.g=g[$.Jw](b('eyJhZGJsb2NrIjp7fSwiZXhjbHVkZXMiOiIifQ==')),t.O=2,t.k='Ly9vZmxlYWZlb25hLmNvbS80MDAvNjIxNTYwOA==',t.A=2,t.S=$.Iq*1691916057,t.P='Zez$#t^*EFng',t.M='oae',t.T='rcff0uqkltl',t.B='wzu3l781',t.N='pzr',t.I='c92btnn0bv0',t.C='_ekhlis',t.R='_aowzaolg';break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD));break;case $.BD:$.Cr;break;}}},function(n,t,e){for($._DI=$.BD;$._DI<$.DC;$._DI+=$.y){switch($._DI){case $.Cf:function w(){for($._DH=$.BD;$._DH<$.CB;$._DH+=$.y){switch($._DH){case $.y:t[$.Ih](s.J,$.Gr+($.BD,f.Z)()),t[$.Ii](s.$,c.Q[d.O]),t[$.Il]=function(){if($.ad===t[$.bJ]){for($._DA=$.BD;$._DA<$.CB;$._DA+=$.y){switch($._DA){case $.y:n[$.l](function(n){for($._Bb=$.BD;$._Bb<$.CB;$._Bb+=$.y){switch($._Bb){case $.y:u[r]=e;break;case $.BD:var t=n[$.Gv]($.dy),r=t[$.cj]()[$.eF](),e=t[$.Bt]($.dy);break;}}}),u[s.W]?(l=!$.BD,($.BD,a.nn)(u[s.W])):u[s.tn]&&($.BD,a.nn)(u[s.tn]);break;case $.BD:var n=t[$.cr]()[$.dd]()[$.Gv](new RegExp($.dz,$.Bu)),u=$.$();break;}}}},t[$.Ij]();break;case $.BD:var t=new window[$.Jj]();break;}}}break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t[$.Di]=function(){return $.Jt+d.e+$.bh;},t.z=function(){return $.Jz+d.e;},t.D=function(){return($.BD,a.H)();},t.F=function(){return[($.BD,u.L)(o.G[$.Ds],o[$.Go][$.Ds]),($.BD,u.L)(o[$.Er][$.Ds],o[$.Go][$.Ds])][$.Bt]($.bp);},t.V=function(){for($._Bd=$.BD;$._Bd<$.CB;$._Bd+=$.y){switch($._Bd){case $.y:n.id=i.U,window[$.JI](n,$.Jv);break;case $.BD:var n=$.$(),t=r(function(){($.BD,f.X)()&&(v(t),w());},$.Jk);break;}}},t.Y=w,t.K=function(){return new Promise(function(t,e){var u=$.BD,i=r(function(){for($._CH=$.BD;$._CH<$.CB;$._CH+=$.y){switch($._CH){case $.y:n?(v(i),l&&(($.BD,f[$.Dq])(),t(n)),t()):$.Fo<=u&&(v(i),e()),u+=$.y;break;case $.BD:var n=($.BD,a.H)();break;}}},$.Jk);});};break;case $.CB:var u=e($.CB),i=e($.Cf),o=e($.Fk),c=e($.Fl),f=e($.Fm),a=e($.Fn),d=e($.BD),s=e($.Fo),l=!$.y;break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._CJ=$.BD;$._CJ<$.Ft;$._CJ+=$.y){switch($._CJ){case $.Cf:function a(n){for($._Bk=$.BD;$._Bk<$.CB;$._Bk+=$.y){switch($._Bk){case $.y:return e<=t&&t<=u?t-e:o<=t&&t<=c?t-o+i:$.BD;break;case $.BD:var t=n[$.Bv]()[$.bC]($.BD);break;}}}break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t[$.Dj]=a,t[$.o]=d,t.rn=function(n,u){return n[$.Gv]($.Bu)[$.aa](function(n,t){for($._BF=$.BD;$._BF<$.CB;$._BF+=$.y){switch($._BF){case $.y:return d(e);break;case $.BD:var r=(u+$.y)*(t+$.y),e=(a(n)+r)%f;break;}}})[$.Bt]($.Bu);},t.en=function(n,u){return n[$.Gv]($.Bu)[$.aa](function(n,t){for($._Bf=$.BD;$._Bf<$.CB;$._Bf+=$.y){switch($._Bf){case $.y:return d(e);break;case $.BD:var r=u[t%(u[$.Gp]-$.y)],e=(a(n)+a(r))%f;break;}}})[$.Bt]($.Bu);},t.L=function(n,c){return n[$.Gv]($.Bu)[$.aa](function(n,t){for($._Ba=$.BD;$._Ba<$.CB;$._Ba+=$.y){switch($._Ba){case $.y:return d(o);break;case $.BD:var r=c[t%(c[$.Gp]-$.y)],e=a(r),u=a(n),i=u-e,o=i<$.BD?i+f:i;break;}}})[$.Bt]($.Bu);};break;case $.DC:function d(n){return n<=$.Fl?k[$.o](n+e):n<=$.ck?k[$.o](n+o-i):k[$.o](e);}break;case $.CB:var e=$.Ct,u=$.Cu,i=u-e+$.y,o=$.Cv,c=$.Cw,f=c-o+$.y+i;break;case $.BD:$.Cr;break;}}},function(t,r,u){for($._Cz=$.BD;$._Cz<$.Ft;$._Cz+=$.y){switch($._Cz){case $.Cf:r.cn=f[$.Bn]()[$.Bv]($.By)[$.CA]($.CB),r.in=f[$.Bn]()[$.Bv]($.By)[$.CA]($.CB),r.U=f[$.Bn]()[$.Bv]($.By)[$.CA]($.CB),r.un=f[$.Bn]()[$.Bv]($.By)[$.CA]($.CB);break;case $.y:Object[$.e](r,$.Cc,$.$($.Ik,!$.BD)),r.un=r.U=r.in=r.cn=r.fn=r.an=void $.BD;break;case $.DC:c&&(c[$.B](a,function t(r){c[$.C](a,t),[($.BD,i.dn)(n[$.cs]),($.BD,i.sn)(window[$.bB][$.t]),($.BD,i.vn)(new e()),($.BD,i.ln)(window[$.br][$.bx]),($.BD,i.wn)(n[$.cx]||n[$.do])][$.l](function(t){for($._Ch=$.BD;$._Ch<$.CB;$._Ch+=$.y){switch($._Ch){case $.y:q(function(){for($._Cb=$.BD;$._Cb<$.CB;$._Cb+=$.y){switch($._Cb){case $.y:n.id=r[$.av],n[$.Ik]=t,window[$.JI](n,$.Jv),($.BD,o[$.Dl])($.eq+t);break;case $.BD:var n=$.$();break;}}},n);break;case $.BD:var n=m($.Fo*f[$.Bn](),$.Fo);break;}}});}),c[$.B](d,function n(t){for($._BI=$.BD;$._BI<$.Ft;$._BI+=$.y){switch($._BI){case $.Cf:var e=window[$.br][$.bx],u=new window[$.Jj]();break;case $.y:var r=$.$();break;case $.DC:u[$.Ih]($.Hy,e),u[$.Il]=function(){r[$.Da]=u[$.cr](),window[$.JI](r,$.Jv);},u[$.Gn]=function(){r[$.Da]=$.cG,window[$.JI](r,$.Jv);},u[$.Ij]();break;case $.CB:r.id=t[$.av];break;case $.BD:c[$.C](d,n);break;}}}));break;case $.CB:var i=u($.Fp),o=u($.DC),c=$.Cs!=typeof document?document[$.a]:null,a=r.an=$.Jd,d=r.fn=$.Je;break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._Bc=$.BD;$._Bc<$.Cf;$._Bc+=$.y){switch($._Bc){case $.CB:var e=[];break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t[$.Dk]=function(){return e;},t[$.Dl]=function(n){e[$.CA](-$.y)[$.ar]()!==n&&e[$.ah](n);};break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._F=$.BD;$._F<$.Cf;$._F+=$.y){switch($._F){case $.CB:t.hn=$.Hm,t.mn=$.Hn,t.yn=$.Ho,t._n=$.Hp,t.bn=$.BD,t.pn=$.y,t.gn=$.CB,t.jn=$.Hq;break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD));break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._Dd=$.BD;$._Dd<$.Cf;$._Dd+=$.y){switch($._Dd){case $.CB:var u=r($.CB),v=r($.Fm),l=r($.BD),f=t.On=new j($.aC,$.Bu),i=($.Cs!=typeof document?document:$.$($.a,null))[$.a],w=$.Cx,y=$.Cy,_=$.Cz,b=$.DA;break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t.On=void $.BD,t.kn=function(e,u,i){for($._Bz=$.BD;$._Bz<$.CB;$._Bz+=$.y){switch($._Bz){case $.y:return e[$.Ds]=o[c],e[$.Gp]=o[$.Gp],function(n){for($._Bm=$.BD;$._Bm<$.CB;$._Bm+=$.y){switch($._Bm){case $.y:if(t===u)for(;r--;)c=(c+=i)>=o[$.Gp]?$.BD:c,e[$.Ds]=o[c];break;case $.BD:var t=n&&n[$.am]&&n[$.am].id,r=n&&n[$.am]&&n[$.am][$.Ik];break;}}};break;case $.BD:var o=e[$.Es][$.Gv](f)[$.af](function(n){return!f[$.Jf](n);}),c=$.BD;break;}}},t[$.Dm]=function(d,s){return function(n){for($._DE=$.BD;$._DE<$.CB;$._DE+=$.y){switch($._DE){case $.y:if(t===s)try{for($._Ck=$.BD;$._Ck<$.CB;$._Ck+=$.y){switch($._Ck){case $.y:d[$.Dr]=m(a/l.y,$.Fo)+$.y,d[$.Du]=d[$.Du]?d[$.Du]:new e(i)[$.cI](),d[$.Ds]=($.BD,v[$.Do])(c+l.P);break;case $.BD:var u=d[$.Du]?new e(d[$.Du])[$.Bv]():r[$.Gv](w)[$.cv](function(n){return n[$.es]($.ev);}),i=u[$.Gv](y)[$.ar](),o=new e(i)[$.dg]()[$.Gv](_),c=o[$.cj](),f=o[$.cj]()[$.Gv](b),a=f[$.cj]();break;}}}catch(n){d[$.Ds]=$.cG;}break;case $.BD:var t=n&&n[$.am]&&n[$.am].id,r=n&&n[$.am]&&n[$.am][$.Da];break;}}};},t.An=function(n,t){for($._e=$.BD;$._e<$.CB;$._e+=$.y){switch($._e){case $.y:r[$.av]=n,i[$.F](r);break;case $.BD:var r=new Event(t);break;}}},t.Sn=function(r,n){return h[$.Cg](null,$.$($.Gp,n))[$.aa](function(n,t){return($.BD,u.rn)(r,t);})[$.Bt]($.eg);};break;case $.BD:$.Cr;break;}}},function(n,t,u){for($._Dl=$.BD;$._Dl<$.Fl;$._Dl+=$.y){switch($._Dl){case $.Fm:function b(n,t){return n+(m[$.Ds]=$.az*m[$.Ds]%$.bv,m[$.Ds]%(t-n));}break;case $.Cf:function w(n){for($._Bw=$.BD;$._Bw<$.CB;$._Bw+=$.y){switch($._Bw){case $.y:return h[$.JH](n);break;case $.BD:if(h[$.JG](n)){for($._Bp=$.BD;$._Bp<$.CB;$._Bp+=$.y){switch($._Bp){case $.y:return r;break;case $.BD:for(var t=$.BD,r=h(n[$.Gp]);t<n[$.Gp];t++)r[t]=n[t];break;}}}break;}}}break;case $.Fr:!function t(){for($._Dh=$.BD;$._Dh<$.Ft;$._Dh+=$.y){switch($._Dh){case $.Cf:var u=r(function(){if($.Bu!==m[$.Ds]){for($._Dc=$.BD;$._Dc<$.Cf;$._Dc+=$.y){switch($._Dc){case $.CB:m[$.Dt]=!$.BD,m[$.Ds]=$.Bu;break;case $.y:try{for($._DF=$.BD;$._DF<$.CB;$._DF+=$.y){switch($._DF){case $.y:q(function(){if(!_){for($._Bx=$.BD;$._Bx<$.CB;$._Bx+=$.y){switch($._Bx){case $.y:m[$.Du]+=n,t(),($.BD,i.xn)(),($.BD,d.V)();break;case $.BD:var n=new e()[$.cI]()-y[$.cI]();break;}}}},$.cd);break;case $.BD:if(h(m[$.Dr])[$.dn]($.BD)[$.l](function(n){for($._Cy=$.BD;$._Cy<$.Cf;$._Cy+=$.y){switch($._Cy){case $.CB:h(t)[$.dn]($.BD)[$.l](function(n){m[$.Bn]+=k[$.o](b($.Cv,$.Cw));});break;case $.y:var t=b($.Fr,$.GF);break;case $.BD:m[$.Bn]=$.Bu;break;}}}),($.BD,a.qn)())return;break;}}}catch(n){}break;case $.BD:if(v(u),window[$.C]($.Gm,n),$.cG===m[$.Ds])return void(m[$.Dt]=!$.BD);break;}}}},$.Jk);break;case $.y:y=new e();break;case $.DC:window[$.B]($.Gm,n);break;case $.CB:var n=($.BD,o[$.Dm])(m,c.U);break;case $.BD:m[$.Dt]=!$.y;break;}}}();break;case $.Ft:m[$.Bn]=$.Bu,m[$.Dr]=$.Bu,m[$.Ds]=$.Bu,m[$.Dt]=void $.BD,m[$.Du]=null,m[$.Dv]=($.BD,s.L)(l.M,l.T);break;case $.CB:var i=u($.Fn),o=u($.Fq),c=u($.Cf),a=u($.Fr),d=u($.y),s=u($.CB),l=u($.BD);break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t[$.Dn]=void $.BD,t[$.Do]=function(n){return n[$.Gv]($.Bu)[$.bj](function(n,t){return(n<<$.Ft)-n+t[$.bC]($.BD)&$.bv;},$.BD);},t.Z=function(){return[m[$.Bn],m[$.Dv]][$.Bt]($.bp);},t[$.Dp]=function(){for($._CI=$.BD;$._CI<$.CB;$._CI+=$.y){switch($._CI){case $.y:return[][$.an](w(h(n)))[$.aa](function(n){return t[f[$.Bn]()*t[$.Gp]|$.BD];})[$.Bt]($.Bu);break;case $.BD:var t=[][$.an](w($.bl)),n=$.DC+($.ag*f[$.Bn]()|$.BD);break;}}},t.X=function(){return m[$.Dt];},t[$.Dq]=function(){_=!$.BD;};break;case $.Fq:var y=new e(),_=!$.y;break;case $.DC:var m=t[$.Dn]=$.$();break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._De=$.BD;$._De<$.Cf;$._De+=$.y){switch($._De){case $.CB:var e=r($.Fs),u=r($.Fl),i=r($.Ft),o=r($.BD),c=r($.DC),f=r($.Fu);break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t[$.Dw]=function(n){for($._s=$.BD;$._s<$.CB;$._s+=$.y){switch($._s){case $.y:return d[$.aB]=f,d[$.ai]=a,d;break;case $.BD:var t=document[$.k],r=document[$.c]||$.$(),e=window[$.ba]||t[$.bt]||r[$.bt],u=window[$.bb]||t[$.bu]||r[$.bu],i=t[$.bc]||r[$.bc]||$.BD,o=t[$.bd]||r[$.bd]||$.BD,c=n[$.bA](),f=c[$.aB]+(e-i),a=c[$.ai]+(u-o),d=$.$();break;}}},t[$.Dx]=function(n){for($._j=$.BD;$._j<$.CB;$._j+=$.y){switch($._j){case $.y:return h[$.CF][$.CA][$.Bz](t);break;case $.BD:var t=document[$.E](n);break;}}},t[$.Dy]=function n(t,r){for($._k=$.BD;$._k<$.Cf;$._k+=$.y){switch($._k){case $.CB:return n(t[$.Cj],r);break;case $.y:if(t[$.aq]===r)return t;break;case $.BD:if(!t)return null;break;}}},t[$.Dz]=function(n){for($._DJ=$.BD;$._DJ<$.DC;$._DJ+=$.y){switch($._DJ){case $.Cf:return!$.y;break;case $.y:for(;n[$.Cj];)r[$.ah](n[$.Cj]),n=n[$.Cj];break;case $.CB:for(var e=$.BD;e<t[$.Gp];e++)for(var u=$.BD;u<r[$.Gp];u++)if(t[e]===r[u])return!$.BD;break;case $.BD:var t=(o.g[$.ce]||$.Bu)[$.Gv]($.Hp)[$.af](function(n){return n;})[$.aa](function(n){return[][$.CA][$.Bz](document[$.E](n));})[$.bj](function(n,t){return n[$.an](t);},[]),r=[n];break;}}},t.Pn=function(){for($._BG=$.BD;$._BG<$.CB;$._BG+=$.y){switch($._BG){case $.y:t.sd=f.En,t[$.aj]=c[$.Dk],t[$.ak]=o.I,t[$.al]=o.B,t[$.Er]=o.N,($.BD,e.Tn)(n,i.hn,o.e,o.S,o.a,t);break;case $.BD:var n=$.ao+($.y===o.A?$.ca:$.cb)+$.cp+u.Mn[o.O],t=$.$();break;}}},t.Bn=function(){for($._y=$.BD;$._y<$.CB;$._y+=$.y){switch($._y){case $.y:return($.BD,e[$.EB])(n,o.a)||($.BD,e[$.EB])(n,o.e);break;case $.BD:var n=u.Nn[o.O];break;}}},t.qn=function(){for($._m=$.BD;$._m<$.CB;$._m+=$.y){switch($._m){case $.y:return($.BD,e[$.EB])(n,o.a);break;case $.BD:var n=u.Nn[o.O];break;}}},t.In=function(){return!u.Nn[o.O];},t.Cn=function(){for($._Cg=$.BD;$._Cg<$.Cf;$._Cg+=$.y){switch($._Cg){case $.CB:try{document[$.k][$.q](r),[$.f,$.h,$.g,$.BI][$.l](function(t){try{window[t];}catch(n){delete window[t],window[t]=r[$.x][t];}}),document[$.k][$.bI](r);}catch(n){}break;case $.y:r[$.m][$.v]=$.BD,r[$.m][$.t]=$.BB,r[$.m][$.s]=$.BB,r[$.i]=$.n;break;case $.BD:var r=document[$.A]($.Bs);break;}}};break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._H=$.BD;$._H<$.Fl;$._H+=$.y){switch($._H){case $.Fm:var v=t.Q=$.$();break;case $.Cf:var e=t.zn=$.y,u=t.Dn=$.CB,i=(t.Hn=$.Cf,t.Fn=$.DC),o=t.Ln=$.Ft,c=t.Gn=$.Cf,f=t.Vn=$.Fq,a=t.Xn=$.Fm,d=t.Mn=$.$();break;case $.Fr:v[e]=$.Gj,v[u]=$.Gk,v[i]=$.Gl,v[o]=$.Gl,v[c]=$.Gl;break;case $.Ft:var s=t.Nn=$.$();break;case $.CB:t.Rn=$.y;break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD));break;case $.Fq:s[e]=$.Gg,s[a]=$.Gh,s[c]=$.Gi,s[u]=$.Gf;break;case $.DC:d[e]=$.GJ,d[i]=$.Ga,d[o]=$.Gb,d[c]=$.Gc,d[f]=$.Gd,d[a]=$.Ge,d[u]=$.Gf;break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._G=$.BD;$._G<$.Cf;$._G+=$.y){switch($._G){case $.CB:t.Un=$.Hr,t.Yn=$.Hs,t.Kn=$.Ht,t.Jn=$.Hu,t.Zn=$.Hv,t.$n=$.Hw,t.Qn=$.Hx,t.J=$.Hy,t.Wn=$.Hz,t.$=$.IA,t.W=$.IB,t.tn=$.IC;break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD));break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._Eb=$.BD;$._Eb<$.Fr;$._Eb+=$.y){switch($._Eb){case $.Fm:v[$.l](function(n){for($._By=$.BD;$._By<$.DC;$._By+=$.y){switch($._By){case $.Cf:try{n[d]=n[d]||[];}catch(n){}break;case $.y:var t=n[$.z][$.k][$.bi].fp;break;case $.CB:n[t]=n[t]||[];break;case $.BD:n[$.z][$.k][$.bi].fp||(n[$.z][$.k][$.bi].fp=f[$.Bn]()[$.Bv]($.By)[$.CA]($.CB));break;}}});break;case $.Cf:s&&s[$.Gn]&&(e=s[$.Gn]);break;case $.Ft:function o(n,e){return n&&e?v[$.l](function(n){for($._Cc=$.BD;$._Cc<$.Cf;$._Cc+=$.y){switch($._Cc){case $.CB:try{n[d]=n[d][$.af](function(n){for($._Bh=$.BD;$._Bh<$.CB;$._Bh+=$.y){switch($._Bh){case $.y:return t||r;break;case $.BD:var t=n[$.bD]!==n,r=n[$.bE]!==e;break;}}});}catch(n){}break;case $.y:n[t]=n[t][$.af](function(n){for($._Bg=$.BD;$._Bg<$.CB;$._Bg+=$.y){switch($._Bg){case $.y:return t||r;break;case $.BD:var t=n[$.bD]!==n,r=n[$.bE]!==e;break;}}});break;case $.BD:var t=n[$.z][$.k][$.bi].fp;break;}}}):(l[$.l](function(e){v[$.l](function(n){for($._EA=$.BD;$._EA<$.Cf;$._EA+=$.y){switch($._EA){case $.CB:try{n[d]=n[d][$.af](function(n){for($._Dr=$.BD;$._Dr<$.CB;$._Dr+=$.y){switch($._Dr){case $.y:return t||r;break;case $.BD:var t=n[$.bD]!==e[$.bD],r=n[$.bE]!==e[$.bE];break;}}});}catch(n){}break;case $.y:n[t]=n[t][$.af](function(n){for($._Dn=$.BD;$._Dn<$.CB;$._Dn+=$.y){switch($._Dn){case $.y:return t||r;break;case $.BD:var t=n[$.bD]!==e[$.bD],r=n[$.bE]!==e[$.bE];break;}}});break;case $.BD:var t=n[$.z][$.k][$.bi].fp;break;}}});}),u[$.l](function(n){window[n]=!$.y;}),u=[],l=[],null);}break;case $.CB:var d=$.DB,s=document[$.a],v=[window],u=[],l=[],e=function(){};break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t.Tn=function(n,t,r){for($._CF=$.BD;$._CF<$.Cf;$._CF+=$.y){switch($._CF){case $.CB:try{for($._Br=$.BD;$._Br<$.CB;$._Br+=$.y){switch($._Br){case $.y:a[$.bD]=n,a[$.Ey]=t,a[$.bE]=r,a[$.bF]=f?f[$.bF]:u,a[$.bG]=o,a[$.bH]=e,(a[$.bf]=i)&&i[$.ci]&&(a[$.ci]=i[$.ci]),l[$.ah](a),v[$.l](function(n){for($._BC=$.BD;$._BC<$.Cf;$._BC+=$.y){switch($._BC){case $.CB:try{n[d][$.ah](a);}catch(n){}break;case $.y:n[t][$.ah](a);break;case $.BD:var t=n[$.z][$.k][$.bi].fp||d;break;}}});break;case $.BD:var c=window[$.z][$.k][$.bi].fp||d,f=window[c][$.af](function(n){return n[$.bE]===r&&n[$.bF];})[$.cj](),a=$.$();break;}}}catch(n){}break;case $.y:try{o=s[$.i][$.Gv]($.Ja)[$.CB];}catch(n){}break;case $.BD:var e=$.Cf<arguments[$.Gp]&&void $.BD!==arguments[$.Cf]?arguments[$.Cf]:$.BD,u=$.DC<arguments[$.Gp]&&void $.BD!==arguments[$.DC]?arguments[$.DC]:$.BD,i=arguments[$.Ft],o=void $.BD;break;}}},t.nt=function(n){u[$.ah](n),window[n]=!$.BD;},t[$.EA]=o,t[$.EB]=function(n,t){for($._CG=$.BD;$._CG<$.CB;$._CG+=$.y){switch($._CG){case $.y:return!$.y;break;case $.BD:for(var r=c(),e=$.BD;e<r[$.Gp];e++)if(r[e][$.bE]===t&&r[e][$.bD]===n)return!$.BD;break;}}},t[$.EC]=c,t[$.ED]=function(){try{o(),e(),e=function(){};}catch(n){}},t.tt=function(e,t){v[$.aa](function(n){for($._Bt=$.BD;$._Bt<$.CB;$._Bt+=$.y){switch($._Bt){case $.y:return r[$.af](function(n){return-$.y<e[$.Ju](n[$.bE]);});break;case $.BD:var t=n[$.z][$.k][$.bi].fp||d,r=n[t]||[];break;}}})[$.bj](function(n,t){return n[$.an](t);},[])[$.l](function(n){try{n[$.bf].sd(t);}catch(n){}});};break;case $.Fq:function c(){for($._Dm=$.BD;$._Dm<$.Cf;$._Dm+=$.y){switch($._Dm){case $.CB:return u;break;case $.y:try{for($._Da=$.BD;$._Da<$.CB;$._Da+=$.y){switch($._Da){case $.y:for(t=$.BD;t<v[$.Gp];t++)r(t);break;case $.BD:var r=function(n){for(var o=v[n][d]||[],t=function(i){$.BD<u[$.af](function(n){for($._BJ=$.BD;$._BJ<$.CB;$._BJ+=$.y){switch($._BJ){case $.y:return e&&u;break;case $.BD:var t=n[$.bD],r=n[$.bE],e=t===o[i][$.bD],u=r===o[i][$.bE];break;}}})[$.Gp]||u[$.ah](o[i]);},r=$.BD;r<o[$.Gp];r++)t(r);};break;}}}catch(n){}break;case $.BD:for(var u=[],n=function(n){for(var t=v[n][$.z][$.k][$.bi].fp,o=v[n][t]||[],r=function(i){$.BD<u[$.af](function(n){for($._BH=$.BD;$._BH<$.CB;$._BH+=$.y){switch($._BH){case $.y:return e&&u;break;case $.BD:var t=n[$.bD],r=n[$.bE],e=t===o[i][$.bD],u=r===o[i][$.bE];break;}}})[$.Gp]||u[$.ah](o[i]);},e=$.BD;e<o[$.Gp];e++)r(e);},t=$.BD;t<v[$.Gp];t++)n(t);break;}}}break;case $.DC:try{for(var i=v[$.CA](-$.y)[$.ar]();i&&i!==i[$.aB]&&i[$.aB][$.bB][$.t];)v[$.ah](i[$.aB]),i=i[$.aB];}catch(n){}break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._Dk=$.BD;$._Dk<$.Fl;$._Dk+=$.y){switch($._Dk){case $.Fm:function b(){for($._I=$.BD;$._I<$.CB;$._I+=$.y){switch($._I){case $.y:return n[$.m][$.s]=$.BB,n[$.m][$.t]=$.BB,n[$.m][$.v]=$.BD,n;break;case $.BD:var n=document[$.A]($.Bs);break;}}}break;case $.Cf:function u(n){return n&&n[$.Cc]?n:$.$($.Ci,n);}break;case $.Fr:function o(){s&&i[$.l](function(n){return n(s);});}break;case $.Ft:function y(){for($._Dj=$.BD;$._Dj<$.CB;$._Dj+=$.y){switch($._Dj){case $.y:return $.Gr+s+$.Ja+r+$.Ja;break;case $.BD:var n=[$.Gy,$.Br,$.Gz,$.HA,$.HB,$.HC,$.HD,$.HE],e=[$.HF,$.HG,$.HH,$.HI,$.HJ],t=[$.Ha,$.Hb,$.Hc,$.Hd,$.He,$.Hf,$.Hg,$.Hh,$.Hi,$.Hj,$.Hk,$.Hl],r=n[f[$.ap](f[$.Bn]()*n[$.Gp])][$.CD](new RegExp($.Gy,$.CH),function(){for($._CD=$.BD;$._CD<$.CB;$._CD+=$.y){switch($._CD){case $.y:return t[n];break;case $.BD:var n=f[$.ap](f[$.Bn]()*t[$.Gp]);break;}}})[$.CD](new RegExp($.Br,$.CH),function(){for($._Df=$.BD;$._Df<$.CB;$._Df+=$.y){switch($._Df){case $.y:return($.Bu+t+f[$.ap](f[$.Bn]()*r))[$.CA](-$.y*t[$.Gp]);break;case $.BD:var n=f[$.ap](f[$.Bn]()*e[$.Gp]),t=e[n],r=f[$.eI]($.Fo,t[$.Gp]);break;}}});break;}}}break;case $.CB:var e=u(r($.Ir)),d=u(r($.GF));break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t[$.EE]=y,t.rt=function(){return y()[$.CA]($.BD,-$.y)+$.cH;},t[$.EF]=function(){for($._r=$.BD;$._r<$.CB;$._r+=$.y){switch($._r){case $.y:return $.Gr+s+$.Ja+n+$.bm;break;case $.BD:var n=f[$.Bn]()[$.Bv]($.By)[$.CA]($.CB);break;}}},t.et=_,t.ut=b,t.En=function(n){for($._J=$.BD;$._J<$.CB;$._J+=$.y){switch($._J){case $.y:s=n,o();break;case $.BD:if(!n)return;break;}}},t[$.EG]=o,t.D=function(){return s;},t.it=function(n){i[$.ah](n),s&&n(s);},t.ot=function(u,i){for($._DD=$.BD;$._DD<$.DC;$._DD+=$.y){switch($._DD){case $.Cf:return window[$.B]($.Gm,function n(t){for($._Cx=$.BD;$._Cx<$.CB;$._Cx+=$.y){switch($._Cx){case $.y:if(r===f)if(null===t[$.am][r]){for($._Cd=$.BD;$._Cd<$.CB;$._Cd+=$.y){switch($._Cd){case $.y:e[r]=i?$.$($.ef,$.ee,$.De,u,$.er,d[$.Ci][$.aD][$.br][$.bx]):u,a[$.x][$.JI](e,$.Jv),c=w,o[$.l](function(n){return n();});break;case $.BD:var e=$.$();break;}}}else a[$.Cj][$.bI](a),window[$.C]($.Gm,n),c=h;break;case $.BD:var r=Object[$.dG](t[$.am])[$.ar]();break;}}}),a[$.i]=n,(document[$.c]||document[$.k])[$.q](a),c=l,t.ct=function(){return c===h;},t.ft=function(n){return $.Fe!=typeof n?null:c===h?n():o[$.ah](n);},t;break;case $.y:var o=[],c=v,n=y(),f=_(n),a=b();break;case $.CB:function t(){for($._BD=$.BD;$._BD<$.CB;$._BD+=$.y){switch($._BD){case $.y:return null;break;case $.BD:if(c===h){for($._BA=$.BD;$._BA<$.CB;$._BA+=$.y){switch($._BA){case $.y:d[$.Ci][$.aD][$.br][$.bx]=n;break;case $.BD:if(c=m,!i)return($.BD,e[$.Ci])(n,$.dw);break;}}}break;}}}break;case $.BD:if(!s)return null;break;}}};break;case $.Fq:function _(n){return n[$.Gv]($.Ja)[$.CA]($.Cf)[$.Bt]($.Ja)[$.Gv]($.Bu)[$.bj](function(n,t,r){for($._Bj=$.BD;$._Bj<$.CB;$._Bj+=$.y){switch($._Bj){case $.y:return n+t[$.bC]($.BD)*e;break;case $.BD:var e=f[$.eI](r+$.y,$.Fm);break;}}},$.dh)[$.Bv]($.By);}break;case $.DC:var s=void $.BD,v=$.BD,l=$.y,w=$.CB,h=$.Cf,m=$.DC,i=[];break;case $.BD:$.Cr;break;}}},function(n,r,e){for($._En=$.BD;$._En<$.Fs;$._En+=$.y){switch($._En){case $.Fl:function S(n,t,r,e){for($._Cs=$.BD;$._Cs<$.Cf;$._Cs+=$.y){switch($._Cs){case $.CB:return($.BD,f.bt)(o,n,t,r,e)[$.bn](function(n){return($.BD,v.mt)(s.e,u),n;})[$.eH](function(n){throw($.BD,v.yt)(s.e,u,o),n;});break;case $.y:var u=$.Io,i=($.BD,w[$.Dp])(),o=$.Gr+($.BD,a.D)()+$.Ja+i+$.cq;break;case $.BD:($.BD,l[$.Dl])($.aJ);break;}}}break;case $.DC:p.c=k,p.p=A;break;case $.Fm:function k(n,t){for($._Cq=$.BD;$._Cq<$.Cf;$._Cq+=$.y){switch($._Cq){case $.CB:return($.BD,f.ht)(u,t)[$.bn](function(n){return($.BD,v.mt)(s.e,r),n;})[$.eH](function(n){throw($.BD,v.yt)(s.e,r,u),n;});break;case $.y:var r=$.Im,e=($.BD,w[$.Dp])(),u=$.Gr+($.BD,a.D)()+$.Ja+e+$.ct+c(n);break;case $.BD:($.BD,l[$.Dl])($.aH);break;}}}break;case $.Cf:var m=new j($.Fy,$.CC),y=new j($.Fz),_=new j($.GA),b=[$.Fd,s.e[$.Bv]($.By)][$.Bt]($.Bu),p=$.$();break;case $.Fr:function A(n,t){for($._Cr=$.BD;$._Cr<$.Cf;$._Cr+=$.y){switch($._Cr){case $.CB:return($.BD,f._t)(u,t)[$.bn](function(n){return($.BD,v.mt)(s.e,r),n;})[$.eH](function(n){throw($.BD,v.yt)(s.e,r,u),n;});break;case $.y:var r=$.In,e=($.BD,w[$.Dp])(),u=$.Gr+($.BD,a.D)()+$.Ja+e+$.cu+c(n);break;case $.BD:($.BD,l[$.Dl])($.aI);break;}}}break;case $.Ft:var g=[p.x=S,p.f=q];break;case $.CB:var u,f=e($.Fv),o=e($.Fu),a=e($.y),d=e($.Fo),s=e($.BD),v=e($.Fw),l=e($.DC),w=e($.Fm),i=e($.Fx),h=(u=i)&&u[$.Cc]?u:$.$($.Ci,u);break;case $.y:Object[$.e](r,$.Cc,$.$($.Ik,!$.BD)),r.at=function(n){for($._v=$.BD;$._v<$.CB;$._v+=$.y){switch($._v){case $.y:return $.Gr+($.BD,a.D)()+$.Ja+t+$.de+r;break;case $.BD:var t=($.BD,w[$.Dp])(),r=c(O(n));break;}}},r.dt=k,r.st=A,r.vt=S,r.lt=q,r.wt=function(n,r,e,u){for($._El=$.BD;$._El<$.DC;$._El+=$.y){switch($._El){case $.Cf:return($.BD,l[$.Dl])(e+$.DA+n),function n(r,e,u,i,o){for($._Eg=$.BD;$._Eg<$.CB;$._Eg+=$.y){switch($._Eg){case $.y:return i&&i!==d.$n?c?c(e,u,i,o)[$.bn](function(n){return n;})[$.eH](function(){return n(r,e,u,i,o);}):S(e,u,i,o):c?p[c](e,u||$.fG)[$.bn](function(n){return t[b]=c,n;})[$.eH](function(){return n(r,e,u,i,o);}):new h[$.Ci](function(n,t){return t();});break;case $.BD:var c=r[$.cj]();break;}}}(i,n,r,e,u)[$.bn](function(n){return n&&n[$.Da]?n:$.$($.bJ,$.ad,$.Da,n);});break;case $.y:var i=(e=e?e[$.cJ]():$.Bu)&&e!==d.$n?[][$.an](g):(o=[t[b]][$.an](Object[$.dG](p)),o[$.af](function(n,t){return n&&o[$.Ju](n)===t;}));break;case $.CB:var o;break;case $.BD:n=O(n);break;}}};break;case $.Fo:function q(n,t,r,e){for($._Ct=$.BD;$._Ct<$.Cf;$._Ct+=$.y){switch($._Ct){case $.CB:return($.BD,f.pt)(i,n,t,r,e)[$.bn](function(n){return($.BD,v.mt)(s.e,u),n;})[$.eH](function(n){throw($.BD,v.yt)(s.e,u,i),n;});break;case $.y:var u=$.Ip,i=($.BD,o.rt)();break;case $.BD:($.BD,l[$.Dl])($.ae),($.BD,o.En)(($.BD,a.D)());break;}}}break;case $.Fq:function O(n){return m[$.Jf](n)?n:y[$.Jf](n)?$.cl+n:_[$.Jf](n)?$.Gr+window[$.br][$.eb]+n:window[$.br][$.bx][$.Gv]($.Ja)[$.CA]($.BD,-$.y)[$.an](n)[$.Bt]($.Ja);}break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._i=$.BD;$._i<$.Ft;$._i+=$.y){switch($._i){case $.Cf:var o=l||i[$.Ci];break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD));break;case $.DC:t[$.Ci]=o;break;case $.CB:var e,u=r($.GB),i=(e=u)&&e[$.Cc]?e:$.$($.Ci,e);break;case $.BD:$.Cr;break;}}},function(n,t,e){for($._Ec=$.BD;$._Ec<$.Fm;$._Ec+=$.y){switch($._Ec){case $.Ft:function u(){var o=r(function(){if(($.BD,d.qn)())v(o);else if(j){for($._DB=$.BD;$._DB<$.CB;$._DB+=$.y){switch($._DB){case $.y:v(o);break;case $.BD:try{for($._Co=$.BD;$._Co<$.DC;$._Co+=$.y){switch($._Co){case $.Cf:g!==i&&(g=i,($.BD,m.tt)([l.e,l.a],g));break;case $.y:j=$.Bu,b[$.Es]=e,y[$.Es]=r,_[$.Es]=($.BD,w.Sn)(u,s.jn),[y,_,b][$.l](function(n){($.BD,w.kn)(n,a.in,p);});break;case $.CB:var i=[($.BD,f.L)(y[$.Ds],_[$.Ds]),($.BD,f.L)(b[$.Ds],_[$.Ds])][$.Bt]($.bp);break;case $.BD:var n=j[$.Gv](w.On)[$.af](function(n){return!w.On[$.Jf](n);}),t=c(n,$.Cf),r=t[$.BD],e=t[$.y],u=t[$.CB];break;}}}catch(n){}break;}}}},$.Jk);}break;case $.CB:var c=function(n,t){for($._EH=$.BD;$._EH<$.Cf;$._EH+=$.y){switch($._EH){case $.CB:throw new TypeError($.Jg);break;case $.y:if(Symbol[$.Js]in Object(n))return function(n,t){for($._ED=$.BD;$._ED<$.Cf;$._ED+=$.y){switch($._ED){case $.CB:return r;break;case $.y:try{for(var o,c=n[Symbol[$.Js]]();!(e=(o=c[$.ek]())[$.ep])&&(r[$.ah](o[$.Ik]),!t||r[$.Gp]!==t);e=!$.BD);}catch(n){u=!$.BD,i=n;}finally{try{!e&&c[$.fI]&&c[$.fI]();}finally{if(u)throw i;}}break;case $.BD:var r=[],e=!$.BD,u=!$.y,i=void $.BD;break;}}}(n,t);break;case $.BD:if(h[$.JG](n))return n;break;}}};break;case $.Cf:t.xn=u,t.H=function(){return g;},t.nn=function(n){n&&(j=n);};break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD));break;case $.Fq:u();break;case $.DC:var f=e($.CB),a=e($.Cf),d=e($.Fr),s=e($.Ft),l=e($.BD),w=e($.Fq),m=e($.Fs),y=$.$(),_=$.$(),b=$.$(),p=$.y,g=$.Bu,j=$.Bu;break;case $.BD:$.Cr;break;}}},function(t,r,e){for($._DC=$.BD;$._DC<$.Ft;$._DC+=$.y){switch($._DC){case $.Cf:function o(){for($._Bu=$.BD;$._Bu<$.CB;$._Bu+=$.y){switch($._Bu){case $.y:try{u[$.A]=t[$.A];}catch(n){for($._Bi=$.BD;$._Bi<$.CB;$._Bi+=$.y){switch($._Bi){case $.y:u[$.A]=r&&r[$.di][$.A];break;case $.BD:var r=[][$.cv][$.Bz](t[$.J]($.Bs),function(n){return $.n===n[$.i];});break;}}}break;case $.BD:var t=u[$.Jb];break;}}}break;case $.y:Object[$.e](r,$.Cc,$.$($.Ik,!$.BD));break;case $.DC:$.Cs!=typeof window&&(u[$.aD]=window,void $.BD!==window[$.bB]&&(u[$.by]=window[$.bB])),$.Cs!=typeof document&&(u[$.Jb]=document,u[$.aE]=document[i]),void $.BD!==n&&(u[$.JC]=n),o(),u[$.EH]=function(){for($._Bo=$.BD;$._Bo<$.CB;$._Bo+=$.y){switch($._Bo){case $.y:try{for($._z=$.BD;$._z<$.CB;$._z+=$.y){switch($._z){case $.y:return n[$.Cn][$.q](t),t[$.Cj]!==n[$.Cn]?!$.y:(t[$.Cj][$.bI](t),u[$.aD]=window[$.aB],u[$.Jb]=u[$.aD][$.z],o(),!$.BD);break;case $.BD:var n=window[$.aB][$.z],t=n[$.A]($.be);break;}}}catch(n){return!$.y;}break;case $.BD:if(!window[$.aB])return null;break;}}},u[$.EI]=function(){try{return u[$.Jb][$.a][$.Cj]!==u[$.Jb][$.Cn]&&(u[$.dj]=u[$.Jb][$.a][$.Cj],u[$.dj][$.m][$.r]&&$.Hi!==u[$.dj][$.m][$.r]||(u[$.dj][$.m][$.r]=$.eu),!$.BD);}catch(n){return!$.y;}},r[$.Ci]=u;break;case $.CB:var u=$.$(),i=$.Gq[$.Gv]($.Bu)[$.Jy]()[$.Bt]($.Bu);break;case $.BD:$.Cr;break;}}},function(Tl,Ul){for($._Be=$.BD;$._Be<$.DC;$._Be+=$.y){switch($._Be){case $.Cf:Tl[$.Bw]=Vl;break;case $.y:Vl=function(){return this;}();break;case $.CB:try{Vl=Vl||Function($.Jx)()||eval($.bk);}catch(n){$.dJ==typeof window&&(Vl=window);}break;case $.BD:var Vl;break;}}},function(n,t,r){for($._CE=$.BD;$._CE<$.CB;$._CE+=$.y){switch($._CE){case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t[$.Ci]=function(n){try{return n[$.Gv]($.Ja)[$.CB][$.Gv]($.bp)[$.CA](-$.CB)[$.Bt]($.bp)[$.eF]();}catch(n){return $.Bu;}};break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._Db=$.BD;$._Db<$.Fq;$._Db+=$.y){switch($._Db){case $.Ft:($.BD,u.Pn)(),window[o.C]=y,window[o.R]=y,q(y,i.mn),($.BD,s.An)(c.U,c.fn),($.BD,s.An)(c.cn,c.an),($.BD,f[$.Ci])();break;case $.CB:function m(n){return n&&n[$.Cc]?n:$.$($.Ci,n);}break;case $.Cf:function y(n){return($.BD,u.Bn)()?null:(($.BD,a[$.Dl])($.cn),($.BD,u.Cn)(),_(n));}break;case $.y:var e=r($.y),u=r($.Fr),i=r($.Ft),o=r($.BD),c=r($.Cf),f=m(r($.Is)),a=r($.DC),d=r($.GC),s=r($.Fq),v=r($.Fm),l=m(r($.It)),w=r($.Fl),h=r($.Fs);break;case $.DC:function _(r){return($.BD,v.X)()?(($.BD,e.Y)(),window[i.yn]=d.wt,($.BD,e.K)()[$.bn](function(n){for($._Cv=$.BD;$._Cv<$.CB;$._Cv+=$.y){switch($._Cv){case $.y:($.BD,l[$.Ci])(o.O,r)[$.bn](function(){($.BD,h.tt)([o.e,o.a],($.BD,e.D)());});break;case $.BD:if(n&&o.O===w.zn){for($._Cm=$.BD;$._Cm<$.CB;$._Cm+=$.y){switch($._Cm){case $.y:return t[$.i]=$.dH+n+$.ex+o.e,void(document[$.c]||document[$.k])[$.q](t);break;case $.BD:var t=document[$.A]($.be);break;}}}break;}}})):q(_,$.Jk);}break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._Di=$.BD;$._Di<$.DC;$._Di+=$.y){switch($._Di){case $.Cf:function d(n,t){try{for($._BE=$.BD;$._BE<$.CB;$._BE+=$.y){switch($._BE){case $.y:return n[$.Ju](r)+o;break;case $.BD:var r=n[$.af](function(n){return-$.y<n[$.Ju](t);})[$.cj]();break;}}}catch(n){return $.BD;}}break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t.dn=function(n){for($._h=$.BD;$._h<$.CB;$._h+=$.y){switch($._h){case $.y:return $.y;break;case $.BD:{for($._f=$.BD;$._f<$.CB;$._f+=$.y){switch($._f){case $.y:if(i[$.Jf](n))return $.CB;break;case $.BD:if(u[$.Jf](n))return $.Cf;break;}}}break;}}},t.sn=function(n){return d(c,n);},t.vn=function(n){return d(f,n[$.bg]());},t.wn=function(n){return d(a,n);},t.ln=function(n){return n[$.Gv]($.Ja)[$.CA]($.y)[$.af](function(n){return n;})[$.cj]()[$.Gv]($.bp)[$.CA](-$.CB)[$.Bt]($.bp)[$.eF]()[$.Gv]($.Bu)[$.bj](function(n,t){return n+($.BD,e[$.Dj])(t);},$.BD)%$.Fq+$.y;};break;case $.CB:var e=r($.CB),u=new j($.GD,$.CC),i=new j($.GE,$.CC),o=$.CB,c=[[$.EJ],[$.Ea,$.Eb,$.Ec],[$.Ed,$.Ee],[$.Ef,$.Eg,$.Eh],[$.Ei,$.Ej]],f=[[$.Ek],[-$.Ff],[-$.Fg],[-$.Fh,-$.Fi],[$.El,$.Ec,-$.Ek,-$.Fj]],a=[[$.Em],[$.En],[$.Eo],[$.Ep],[$.Eq]];break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._l=$.BD;$._l<$.Fq;$._l+=$.y){switch($._l){case $.Ft:f[$.Es]=($.BD,i.Sn)(o.I,d),a[$.Es]=o.N,window[$.B]($.Gm,($.BD,i.kn)(f,e.cn,u.jn)),window[$.B]($.Gm,($.BD,i.kn)(a,e.cn,$.y));break;case $.CB:var e=r($.Cf),u=r($.Ft),i=r($.Fq),o=r($.BD),c=t.G=$.$(),f=t[$.Go]=$.$(),a=t[$.Er]=$.$();break;case $.Cf:c[$.Es]=o.B,window[$.B]($.Gm,($.BD,i.kn)(c,e.cn,$.y));break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t[$.Er]=t[$.Go]=t.G=void $.BD;break;case $.DC:var d=c[$.Gp]*u.jn;break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._BB=$.BD;$._BB<$.Cf;$._BB+=$.y){switch($._BB){case $.CB:var e,u=r($.GF),i=(e=u)&&e[$.Cc]?e:$.$($.Ci,e);break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t[$.Ci]=function(n,t,r){for($._u=$.BD;$._u<$.DC;$._u+=$.y){switch($._u){case $.Cf:return e[$.Cj][$.bI](e),u;break;case $.y:e[$.m][$.s]=$.BB,e[$.m][$.t]=$.BB,e[$.m][$.v]=$.BD,e[$.i]=$.n,(i[$.Ci][$.Jb][$.c]||i[$.Ci][$.aE])[$.q](e);break;case $.CB:var u=e[$.x][$.Ih][$.Bz](i[$.Ci][$.aD],n,t,r);break;case $.BD:var e=i[$.Ci][$.Jb][$.A]($.Bs);break;}}};break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._Dw=$.BD;$._Dw<$.Ft;$._Dw+=$.y){switch($._Dw){case $.Cf:function i(n){for($._Du=$.BD;$._Du<$.CB;$._Du+=$.y){switch($._Du){case $.y:i!==l&&i!==w||(t===h?(d[$.cA]=m,d[$.da]=v.O,d[$.cE]=v.e,d[$.db]=v.a):t!==y||!o||f&&!a||(d[$.cA]=_,d[$.cC]=o,($.BD,s.wt)(r,c,u,e)[$.bn](function(n){for($._DG=$.BD;$._DG<$.CB;$._DG+=$.y){switch($._DG){case $.y:t[$.cA]=p,t[$.bz]=r,t[$.cC]=o,t[$.am]=n,g(i,t);break;case $.BD:var t=$.$();break;}}})[$.eH](function(n){for($._Do=$.BD;$._Do<$.CB;$._Do+=$.y){switch($._Do){case $.y:t[$.cA]=b,t[$.bz]=r,t[$.cC]=o,t[$.cG]=n&&n[$.Gm],g(i,t);break;case $.BD:var t=$.$();break;}}})),d[$.cA]&&g(i,d));break;case $.BD:var r=n&&n[$.am]&&n[$.am][$.bz],t=n&&n[$.am]&&n[$.am][$.cA],e=n&&n[$.am]&&n[$.am][$.c],u=n&&n[$.am]&&n[$.am][$.cB],i=n&&n[$.am]&&n[$.am][$.JJ],o=n&&n[$.am]&&n[$.am][$.cC],c=n&&n[$.am]&&n[$.am][$.cD],f=n&&n[$.am]&&n[$.am][$.cE],a=f===v.e||f===v.a,d=$.$();break;}}}break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t[$.Ci]=function(){for($._x=$.BD;$._x<$.CB;$._x+=$.y){switch($._x){case $.y:window[$.B]($.Gm,i);break;case $.BD:try{(e=new x(l))[$.B]($.Gm,i),(u=new x(w))[$.B]($.Gm,i);}catch(n){}break;}}};break;case $.DC:function g(n,t){for($._o=$.BD;$._o<$.CB;$._o+=$.y){switch($._o){case $.y:window[$.JI](t,$.Jv);break;case $.BD:switch(t[$.JJ]=n){case w:u[$.JI](t);break;case l:default:e[$.JI](t);}break;}}}break;case $.CB:var s=r($.GC),v=r($.BD),l=$.DD,w=$.DE,h=$.DF,m=$.DG,y=$.DH,_=$.DI,b=$.DJ,p=$.Da,e=void $.BD,u=void $.BD;break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._Eh=$.BD;$._Eh<$.Fm;$._Eh+=$.y){switch($._Eh){case $.Ft:function S(n){return y(b(n)[$.Gv]($.Bu)[$.aa](function(n){return $.cw+($.HG+n[$.bC]($.BD)[$.Bv]($.GF))[$.CA](-$.CB);})[$.Bt]($.Bu));}break;case $.CB:var j=$.Fe==typeof Symbol&&$.aA==typeof Symbol[$.Js]?function(n){return typeof n;}:function(n){return n&&$.Fe==typeof Symbol&&n[$.em]===Symbol&&n!==Symbol[$.CF]?$.aA:typeof n;};break;case $.Cf:t.ht=function(n,o){return new v[$.Ci](function(e,u){for($._EC=$.BD;$._EC<$.CB;$._EC+=$.y){switch($._EC){case $.y:i[$.bx]=n,i[$.cg]=O.jt,i[$.cA]=O.Ot,i[$.ch]=O.kt,document[$.Cn][$.co](i,document[$.Cn][$.Ce]),i[$.Il]=function(){for($._Dx=$.BD;$._Dx<$.CB;$._Dx+=$.y){switch($._Dx){case $.y:var t,r;break;case $.BD:try{for($._Dp=$.BD;$._Dp<$.CB;$._Dp+=$.y){switch($._Dp){case $.y:i[$.Cj][$.bI](i),o===A.Zn?e(x(n)):e(S(n));break;case $.BD:var n=(t=i[$.bx],((r=h[$.CF][$.CA][$.Bz](document[$.en])[$.af](function(n){return n[$.bx]===t;})[$.ar]()[$.fB])[$.BD][$.fC][$.es]($.fE)?r[$.BD][$.m][$.fH]:r[$.CB][$.m][$.fH])[$.CA]($.y,-$.y));break;}}}catch(n){u();}break;}}},i[$.Gn]=function(){i[$.Cj][$.bI](i),u();};break;case $.BD:var i=document[$.A](O.gt);break;}}});},t._t=function(t,w){return new v[$.Ci](function(v,n){for($._Ef=$.BD;$._Ef<$.CB;$._Ef+=$.y){switch($._Ef){case $.y:l[$.ch]=$.cm,l[$.i]=t,l[$.Il]=function(){for($._Ea=$.BD;$._Ea<$.Fm;$._Ea+=$.y){switch($._Ea){case $.Ft:var d=c(i[$.Bt]($.Bu)[$.ea]($.BD,u)),s=w===A.Zn?x(d):S(d);break;case $.CB:var t=n[$.dr]($.dv);break;case $.Cf:t[$.df](l,$.BD,$.BD);break;case $.y:n[$.s]=l[$.s],n[$.t]=l[$.t];break;case $.Fq:return v(s);break;case $.DC:for(var r=t[$.ds]($.BD,$.BD,l[$.s],l[$.t]),e=r[$.am],u=e[$.CA]($.BD,$.Fu)[$.af](function(n,t){return(t+$.y)%$.DC;})[$.Jy]()[$.bj](function(n,t,r){return n+t*f[$.eI]($.fA,r);},$.BD),i=[],o=$.Fu;o<e[$.Gp];o++)if((o+$.y)%$.DC){for($._EG=$.BD;$._EG<$.CB;$._EG+=$.y){switch($._EG){case $.y:(w===A.Zn||$.GI<=a)&&i[$.ah](k[$.o](a));break;case $.BD:var a=e[o];break;}}}break;case $.BD:var n=document[$.A]($.du);break;}}},l[$.Gn]=function(){return n();};break;case $.BD:var l=new Image();break;}}});},t.bt=function(u,i){for($._Dz=$.BD;$._Dz<$.CB;$._Dz+=$.y){switch($._Dz){case $.y:return new v[$.Ci](function(t,r){for($._Dt=$.BD;$._Dt<$.CB;$._Dt+=$.y){switch($._Dt){case $.y:if(e[$.Ih](a,u),e[$.cD]=f,e[$.cc]=!$.BD,e[$.Ii](A.Un,c(o(i))),e[$.Il]=function(){for($._Cu=$.BD;$._Cu<$.CB;$._Cu+=$.y){switch($._Cu){case $.y:n[$.bJ]=e[$.bJ],n[$.Da]=f===A.Jn?g[$.ec](e[$.Da]):e[$.Da],$.BD<=[$.ad,$.dk][$.Ju](e[$.bJ])?t(n):r(new Error($.eA+e[$.bJ]+$.cp+e[$.ed]+$.eh+i));break;case $.BD:var n=$.$();break;}}},e[$.Gn]=function(){r(new Error($.eA+e[$.bJ]+$.cp+e[$.ed]+$.eh+i));},a===A.Qn){for($._Dq=$.BD;$._Dq<$.CB;$._Dq+=$.y){switch($._Dq){case $.y:e[$.Ii](A.Yn,A.Kn),e[$.Ij](n);break;case $.BD:var n=$.dJ===(void $.BD===d?$.Cs:j(d))?g[$.ec](d):d;break;}}}else e[$.Ij]();break;case $.BD:var e=new window[$.Jj]();break;}}});break;case $.BD:var f=$.CB<arguments[$.Gp]&&void $.BD!==arguments[$.CB]?arguments[$.CB]:A.Jn,a=$.Cf<arguments[$.Gp]&&void $.BD!==arguments[$.Cf]?arguments[$.Cf]:A.$n,d=$.DC<arguments[$.Gp]&&void $.BD!==arguments[$.DC]?arguments[$.DC]:$.$();break;}}},t.pt=function(t,m){for($._EB=$.BD;$._EB<$.CB;$._EB+=$.y){switch($._EB){case $.y:return new v[$.Ci](function(f,a){for($._Dy=$.BD;$._Dy<$.Cf;$._Dy+=$.y){switch($._Dy){case $.CB:window[$.B]($.Gm,n),s[$.i]=t,(document[$.c]||document[$.k])[$.q](s),w=q(h,O.At),l=q(h,O.St);break;case $.y:function n(n){for($._Dv=$.BD;$._Dv<$.CB;$._Dv+=$.y){switch($._Dv){case $.y:if(t===d)if(u(w),null===n[$.am][t]){for($._Cw=$.BD;$._Cw<$.CB;$._Cw+=$.y){switch($._Cw){case $.y:r[t]=$.$($.ef,$.ei,$.bz,c(o(m)),$.cB,_,$.c,$.dJ===(void $.BD===p?$.Cs:j(p))?g[$.ec](p):p),_===A.Qn&&(r[t][$.et]=g[$.ec]($.$($.Hs,A.Kn))),s[$.x][$.JI](r,$.Jv);break;case $.BD:var r=$.$();break;}}}else{for($._Ds=$.BD;$._Ds<$.Cf;$._Ds+=$.y){switch($._Ds){case $.CB:e[$.bJ]=i[$.fF],e[$.Da]=y===A.Zn?x(i[$.c]):S(i[$.c]),$.BD<=[$.ad,$.dk][$.Ju](e[$.bJ])?f(e):a(new Error($.eA+e[$.bJ]+$.eh+m));break;case $.y:var e=$.$(),i=g[$.Jw](b(n[$.am][t]));break;case $.BD:v=!$.BD,h(),u(l);break;}}}break;case $.BD:var t=Object[$.dG](n[$.am])[$.ar]();break;}}}break;case $.BD:var d=($.BD,i.et)(t),s=($.BD,i.ut)(),v=!$.y,l=void $.BD,w=void $.BD,h=function(){try{s[$.Cj][$.bI](s),window[$.C]($.Gm,n),v||a(new Error($.dt));}catch(n){}};break;}}});break;case $.BD:var y=$.CB<arguments[$.Gp]&&void $.BD!==arguments[$.CB]?arguments[$.CB]:A.Jn,_=$.Cf<arguments[$.Gp]&&void $.BD!==arguments[$.Cf]?arguments[$.Cf]:A.$n,p=$.DC<arguments[$.Gp]&&void $.BD!==arguments[$.DC]?arguments[$.DC]:$.$();break;}}};break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD));break;case $.Fq:function x(n){for($._t=$.BD;$._t<$.CB;$._t+=$.y){switch($._t){case $.y:return new p(t)[$.aa](function(n,t){return r[$.bC](t);});break;case $.BD:var r=b(n),t=new s(r[$.Gp]);break;}}}break;case $.DC:var e,O=r($.GG),A=r($.Fo),i=r($.Fu),a=r($.Fx),v=(e=a)&&e[$.Cc]?e:$.$($.Ci,e);break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._a=$.BD;$._a<$.Fq;$._a+=$.y){switch($._a){case $.Ft:u[$.m][$.Gs]=i,u[$.m][$.Gt]=o;break;case $.CB:t.qt=$.ID,t.St=$.Hn,t.At=$.IE,t.xt=$.IF,t.Pt=[$.Iu,$.Iv,$.Iw,$.Ix,$.Iy,$.Iz],t.Mt=$.IG,t.Et=$.BA;break;case $.Cf:var e=t.Tt=$.JA,u=t.Bt=document[$.A](e),i=t.Nt=$.Jh,o=t.It=$.Ji;break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD));break;case $.DC:t.Ct=$.IH,t.Rt=[$.JA,$.JB,$.Hg,$.JC,$.Ig],t.zt=[$.JD,$.JE,$.JF],t.Dt=$.II,t.Ht=$.IJ,t.Ft=!$.BD,t.Lt=!$.y,t.gt=$.Ia,t.jt=$.Ib,t.kt=$.Ic,t.Ot=$.Id;break;case $.BD:$.Cr;break;}}},function(n,t,r){(function(i){!function(d,s){for($._Ek=$.BD;$._Ek<$.Ft;$._Ek+=$.y){switch($._Ek){case $.Cf:function o(t){return l(function(n){n(t);});}break;case $.y:function l(f,a){return(a=function r(e,u,i,o,c,n){for($._Ei=$.BD;$._Ei<$.DC;$._Ei+=$.y){switch($._Ei){case $.Cf:function t(t){return function(n){c&&(c=$.BD,r(v,t,n));};}break;case $.y:if(i&&v(d,i)|v(s,i))try{c=i[$.bn];}catch(n){u=$.BD,i=n;}break;case $.CB:if(v(d,c))try{c[$.Bz](i,t($.y),u=t($.BD));}catch(n){u(n);}else for(a=function(r,n){return v(d,r=u?r:n)?l(function(n,t){w(this,n,t,i,r);}):f;},n=$.BD;n<o[$.Gp];)c=o[n++],v(d,e=c[u])?w(c.p,c.r,c.j,i,e):(u?c.r:c.j)(i);break;case $.BD:if(o=r.q,e!=v)return l(function(n,t){o[$.ah]($.$($.Ig,this,$.el,n,$.Ie,t,$.y,e,$.BD,u));});break;}}}).q=[],f[$.Bz](f=$.$($.bn,function(n,t){return a(n,t);},$.eH,function(n){return a($.BD,n);}),function(n){a(v,$.y,n);},function(n){a(v,$.BD,n);}),f;}break;case $.DC:(n[$.Bw]=l)[$.bw]=o,l[$.aw]=function(r){return l(function(n,t){t(r);});},l[$.ax]=function(n){return l(function(r,e,u,i){i=[],u=n[$.Gp]||r(i),n[$.aa](function(n,t){o(n)[$.bn](function(n){i[t]=n,--u||r(i);},e);});});},l[$.ay]=function(n){return l(function(t,r){n[$.aa](function(n){o(n)[$.bn](t,r);});});};break;case $.CB:function w(n,t,r,e,u){i(function(){try{u=(e=u(e))&&v(s,e)|v(d,e)&&e[$.bn],v(d,u)?e==n?r(TypeError()):u[$.Bz](e,t,r):t(e);}catch(n){r(n);}});}break;case $.BD:function v(n,t){return(typeof t)[$.BD]==n;}break;}}}($.Dc,$.fh);}[$.Bz](t,r($.ag)[$.Jq]));},function(n,o,c){(function(n){for($._Ca=$.BD;$._Ca<$.Cf;$._Ca+=$.y){switch($._Ca){case $.CB:o[$.Bf]=function(){return new i(e[$.Bz](q,t,arguments),u);},o[$.Bg]=function(){return new i(e[$.Bz](r,t,arguments),v);},o[$.Bi]=o[$.Bj]=function(n){n&&n[$.aG]();},i[$.CF][$.aF]=i[$.CF][$.bo]=function(){},i[$.CF][$.aG]=function(){this[$.au][$.Bz](t,this[$.at]);},o[$.Jn]=function(n,t){u(n[$.cF]),n[$.bq]=t;},o[$.Jo]=function(n){u(n[$.cF]),n[$.bq]=-$.y;},o[$.Jp]=o[$.as]=function(n){for($._CB=$.BD;$._CB<$.Cf;$._CB+=$.y){switch($._CB){case $.CB:$.BD<=t&&(n[$.cF]=q(function(){n[$.eG]&&n[$.eG]();},t));break;case $.y:var t=n[$.bq];break;case $.BD:u(n[$.cF]);break;}}},c($.Jc),o[$.Jq]=$.Cs!=typeof self&&self[$.Jq]||void $.BD!==n&&n[$.Jq]||this&&this[$.Jq],o[$.Jr]=$.Cs!=typeof self&&self[$.Jr]||void $.BD!==n&&n[$.Jr]||this&&this[$.Jr];break;case $.y:function i(n,t){this[$.at]=n,this[$.au]=t;}break;case $.BD:var t=void $.BD!==n&&n||$.Cs!=typeof self&&self||window,e=Function[$.CF][$.Cg];break;}}}[$.Bz](o,c($.ey)));},function(n,t,r){(function(n,y){!function(r,e){for($._Et=$.BD;$._Et<$.DC;$._Et+=$.y){switch($._Et){case $.Cf:function m(n){if(d)q(m,$.BD,n);else{for($._Cp=$.BD;$._Cp<$.CB;$._Cp+=$.y){switch($._Cp){case $.y:if(t){for($._Cn=$.BD;$._Cn<$.CB;$._Cn+=$.y){switch($._Cn){case $.y:try{!function(n){for($._Bs=$.BD;$._Bs<$.CB;$._Bs+=$.y){switch($._Bs){case $.y:switch(r[$.Gp]){case $.BD:t();break;case $.y:t(r[$.BD]);break;case $.CB:t(r[$.BD],r[$.y]);break;case $.Cf:t(r[$.BD],r[$.y],r[$.CB]);break;default:t[$.Cg](e,r);}break;case $.BD:var t=n[$.dl],r=n[$.dm];break;}}}(t);}finally{l(n),d=!$.y;}break;case $.BD:d=!$.BD;break;}}}break;case $.BD:var t=a[n];break;}}}}break;case $.y:if(!r[$.Jq]){for($._Es=$.BD;$._Es<$.CB;$._Es+=$.y){switch($._Es){case $.y:v=v&&v[$.Bf]?v:r,$.bs===$.$()[$.Bv][$.Bz](r[$.dI])?u=function(n){y[$.Et](function(){m(n);});}:!function(){if(r[$.JI]&&!r[$.ez]){for($._Dg=$.BD;$._Dg<$.CB;$._Dg+=$.y){switch($._Dg){case $.y:return r[$.fD]=function(){n=!$.y;},r[$.JI]($.Bu,$.Jv),r[$.fD]=t,n;break;case $.BD:var n=!$.BD,t=r[$.fD];break;}}}}()?r[$.Bk]?((t=new w())[$.fa][$.fD]=function(n){m(n[$.am]);},u=function(n){t[$.fb][$.JI](n);}):s&&$.fg in s[$.A]($.be)?(i=s[$.k],u=function(n){for($._Ep=$.BD;$._Ep<$.CB;$._Ep+=$.y){switch($._Ep){case $.y:t[$.fg]=function(){m(n),t[$.fg]=null,i[$.bI](t),t=null;},i[$.q](t);break;case $.BD:var t=s[$.A]($.be);break;}}}):u=function(n){q(m,$.BD,n);}:(o=$.fi+f[$.Bn]()+$.fk,n=function(n){n[$.fj]===r&&$.fm==typeof n[$.am]&&$.BD===n[$.am][$.Ju](o)&&m(+n[$.am][$.CA](o[$.Gp]));},r[$.B]?r[$.B]($.Gm,n,!$.y):r[$.fl]($.fD,n),u=function(n){r[$.JI](o+n,$.Jv);}),v[$.Jq]=function(n){for($._Cj=$.BD;$._Cj<$.DC;$._Cj+=$.y){switch($._Cj){case $.Cf:return a[c]=e,u(c),c++;break;case $.y:for(var t=new h(arguments[$.Gp]-$.y),r=$.BD;r<t[$.Gp];r++)t[r]=arguments[r+$.y];break;case $.CB:var e=$.$($.dl,n,$.dm,t);break;case $.BD:$.Fe!=typeof n&&(n=new Function($.Bu+n));break;}}},v[$.Jr]=l;break;case $.BD:var u,i,t,o,n,c=$.y,a=$.$(),d=!$.y,s=r[$.z],v=Object[$.cf]&&Object[$.cf](r);break;}}}break;case $.CB:function l(n){delete a[n];}break;case $.BD:$.Cr;break;}}}($.Cs==typeof self?void $.BD===n?this:n:self);}[$.Bz](t,r($.ey),r($.fn)));},function(n,t){for($._Cl=$.BD;$._Cl<$.Fs;$._Cl+=$.y){switch($._Cl){case $.Fl:function y(){}break;case $.DC:!function(){for($._w=$.BD;$._w<$.CB;$._w+=$.y){switch($._w){case $.y:try{e=$.Fe==typeof u?u:c;}catch(n){e=c;}break;case $.BD:try{r=$.Fe==typeof q?q:o;}catch(n){r=o;}break;}}}();break;case $.Fm:function w(){if(!s){for($._Ce=$.BD;$._Ce<$.DC;$._Ce+=$.y){switch($._Ce){case $.Cf:a=null,s=!$.y,function(t){for($._CC=$.BD;$._CC<$.Cf;$._CC+=$.y){switch($._CC){case $.CB:try{e(t);}catch(n){try{return e[$.Bz](null,t);}catch(n){return e[$.Bz](this,t);}}break;case $.y:if((e===c||!e)&&u)return(e=u)(t);break;case $.BD:if(e===u)return u(t);break;}}}(n);break;case $.y:s=!$.BD;break;case $.CB:for(var t=d[$.Gp];t;){for($._Bv=$.BD;$._Bv<$.CB;$._Bv+=$.y){switch($._Bv){case $.y:v=-$.y,t=d[$.Gp];break;case $.BD:for(a=d,d=[];++v<t;)a&&a[v][$.Gu]();break;}}}break;case $.BD:var n=f(l);break;}}}}break;case $.Cf:function f(t){for($._Bl=$.BD;$._Bl<$.Cf;$._Bl+=$.y){switch($._Bl){case $.CB:try{return r(t,$.BD);}catch(n){try{return r[$.Bz](null,t,$.BD);}catch(n){return r[$.Bz](this,t,$.BD);}}break;case $.y:if((r===o||!r)&&q)return(r=q)(t,$.BD);break;case $.BD:if(r===q)return q(t,$.BD);break;}}}break;case $.Fr:function m(n,t){this[$.Jl]=n,this[$.Jm]=t;}break;case $.Ft:var a,d=[],s=!$.y,v=-$.y;break;case $.CB:function c(){throw new Error($.Gx);}break;case $.y:function o(){throw new Error($.Gw);}break;case $.Fo:i[$.Et]=function(n){for($._Bq=$.BD;$._Bq<$.Cf;$._Bq+=$.y){switch($._Bq){case $.CB:d[$.ah](new m(n,t)),$.y!==d[$.Gp]||s||f(w);break;case $.y:if($.y<arguments[$.Gp])for(var r=$.y;r<arguments[$.Gp];r++)t[r-$.y]=arguments[r];break;case $.BD:var t=new h(arguments[$.Gp]-$.y);break;}}},m[$.CF][$.Gu]=function(){this[$.Jl][$.Cg](null,this[$.Jm]);},i[$.Eu]=$.Ev,i[$.Ev]=!$.BD,i[$.Ew]=$.$(),i[$.Ex]=[],i[$.Ey]=$.Bu,i[$.Ez]=$.$(),i.on=y,i[$.FA]=y,i[$.FB]=y,i[$.FC]=y,i[$.FD]=y,i[$.FE]=y,i[$.FF]=y,i[$.FG]=y,i[$.FH]=y,i[$.FI]=function(n){return[];},i[$.FJ]=function(n){throw new Error($.ab);},i[$.Fa]=function(){return $.Ja;},i[$.Fb]=function(n){throw new Error($.ac);},i[$.Fc]=function(){return $.BD;};break;case $.Fq:function l(){s&&a&&(s=!$.y,a[$.Gp]?d=a[$.an](d):v=-$.y,d[$.Gp]&&w());}break;case $.BD:var r,e,i=n[$.Bw]=$.$();break;}}},function(r,u,i){for($._Ed=$.BD;$._Ed<$.Fr;$._Ed+=$.y){switch($._Ed){case $.Fm:v.Kt=$.Dd,v.Jt=$.Dh,v.Zt=$.Ie,v.$t=$.If,v.Qt=$.Ig,v.Wt=$.IG;break;case $.Cf:u.mt=function(n,r){for($._q=$.BD;$._q<$.CB;$._q+=$.y){switch($._q){case $.y:t[f]=a+$.y,t[o]=new e()[$.cI](),t[c]=$.Bu;break;case $.BD:var u=E(n,r),i=A(u,$.Cf),o=i[$.BD],c=i[$.y],f=i[$.CB],a=m(t[f],$.Fo)||$.BD;break;}}},u.yt=function(r,u,i){for($._Ci=$.BD;$._Ci<$.Cf;$._Ci+=$.y){switch($._Ci){case $.CB:var g,j,O,k;break;case $.y:if(t[a]&&!t[d]){for($._Cf=$.BD;$._Cf<$.DC;$._Cf+=$.y){switch($._Cf){case $.Cf:g=p,j=$.dH+($.BD,x.D)()+$.eJ,O=Object[$.dG](g)[$.aa](function(n){for($._CA=$.BD;$._CA<$.CB;$._CA+=$.y){switch($._CA){case $.y:return[n,t][$.Bt]($.ej);break;case $.BD:var t=z(g[n]);break;}}})[$.Bt]($.ew),(k=new window[$.Jj]())[$.Ih]($.Hx,j,!$.BD),k[$.Ii](q.Yn,q.Wn),k[$.Ij](O);break;case $.y:t[d]=w,t[s]=$.BD;break;case $.CB:var p=$.$($.cy,r,$.cz,_,$.dA,h,$.dB,i,$.dC,w,$.eo,function(){for($._Bn=$.BD;$._Bn<$.DC;$._Bn+=$.y){switch($._Bn){case $.Cf:return t[P]=r;break;case $.y:if(n)return n;break;case $.CB:var r=f[$.Bn]()[$.Bv]($.By)[$.CA]($.CB);break;case $.BD:var n=t[P];break;}}}(),$.dD,b,$.dE,l,$.dF,v,$.dc,n[$.cs],$.dp,window[$.bB][$.s],$.dq,window[$.bB][$.t],$.cB,u||M,$.dx,new e()[$.bg](),$.eB,($.BD,S[$.Ci])(i),$.eC,($.BD,S[$.Ci])(_),$.eD,($.BD,S[$.Ci])(b),$.eE,n[$.cx]||n[$.do]);break;case $.BD:var v=m(t[s],$.Fo)||$.BD,l=m(t[a],$.Fo),w=new e()[$.cI](),h=w-l,y=document,_=y[$.cz],b=window[$.br][$.bx];break;}}}break;case $.BD:var o=E(r,u),c=A(o,$.Cf),a=c[$.BD],d=c[$.y],s=c[$.CB];break;}}};break;case $.Ft:var P=$.Db,a=$.Dc,d=$.Dd,s=$.De,M=$.Df,v=$.$();break;case $.CB:var A=function(n,t){for($._EI=$.BD;$._EI<$.Cf;$._EI+=$.y){switch($._EI){case $.CB:throw new TypeError($.Jg);break;case $.y:if(Symbol[$.Js]in Object(n))return function(n,t){for($._EE=$.BD;$._EE<$.Cf;$._EE+=$.y){switch($._EE){case $.CB:return r;break;case $.y:try{for(var o,c=n[Symbol[$.Js]]();!(e=(o=c[$.ek]())[$.ep])&&(r[$.ah](o[$.Ik]),!t||r[$.Gp]!==t);e=!$.BD);}catch(n){u=!$.BD,i=n;}finally{try{!e&&c[$.fI]&&c[$.fI]();}finally{if(u)throw i;}}break;case $.BD:var r=[],e=!$.BD,u=!$.y,i=void $.BD;break;}}}(n,t);break;case $.BD:if(h[$.JG](n))return n;break;}}};break;case $.y:Object[$.e](u,$.Cc,$.$($.Ik,!$.BD));break;case $.Fq:function E(n,t){for($._b=$.BD;$._b<$.CB;$._b+=$.y){switch($._b){case $.y:return[[P,e][$.Bt](r),[P,e,a][$.Bt](r),[P,e,d][$.Bt](r)];break;case $.BD:var r=v[t]||s,e=m(n,$.Fo)[$.Bv]($.By);break;}}}break;case $.DC:var o,c=i($.GH),S=(o=c)&&o[$.Cc]?o:$.$($.Ci,o),q=i($.Fo),x=i($.y);break;case $.BD:$.Cr;break;}}},function(n,t,r){for($._Er=$.BD;$._Er<$.Ft;$._Er+=$.y){switch($._Er){case $.Cf:function o(n){return n&&n[$.Cc]?n:$.$($.Ci,n);}break;case $.y:Object[$.e](t,$.Cc,$.$($.Ik,!$.BD)),t[$.Ci]=function(t,r){for($._Eq=$.BD;$._Eq<$.CB;$._Eq+=$.y){switch($._Eq){case $.y:return($.BD,u.wt)(n,null,null,null)[$.bn](function(n){return(n=n&&$.Da in n?n[$.Da]:n)&&($.BD,i.nr)(c.e,n),n;})[$.eH](function(){return($.BD,i.tr)(c.e);})[$.bn](function(n){for($._Eo=$.BD;$._Eo<$.CB;$._Eo+=$.y){switch($._Eo){case $.y:n&&(u=n,i=t,o=r,new v[$.Ci](function(n,t){for($._Em=$.BD;$._Em<$.DC;$._Em+=$.y){switch($._Em){case $.Cf:q(function(){return void $.BD!==r&&r[$.Cj][$.bI](r),($.BD,s.Bn)(i)?(($.BD,a[$.Dl])($.fc),n()):t();});break;case $.y:var r=void $.BD;break;case $.CB:if(-$.y<[f.Fn,f.Gn,f.Ln][$.Ju](c.O)){for($._Ej=$.BD;$._Ej<$.DC;$._Ej+=$.y){switch($._Ej){case $.Cf:try{w[$.Cj][$.co](r,w);}catch(n){(document[$.c]||document[$.k])[$.q](r);}break;case $.y:var e=document[$.j](u);break;case $.CB:r[$.Il]=o,r[$.q](e),r[$.fd]($.fe,c.e),r[$.fd]($.ff,($.BD,l[$.Ci])(b(c.k)));break;case $.BD:r=document[$.A]($.be);break;}}}else d(u);break;case $.BD:($.BD,a[$.Dl])($.fJ);break;}}}));break;case $.BD:var u,i,o;break;}}});break;case $.BD:var n=t===f.zn?($.BD,e[$.Di])():b(c.k);break;}}};break;case $.DC:var w=document[$.a];break;case $.CB:var c=r($.BD),f=r($.Fl),a=r($.DC),e=r($.y),u=r($.GC),i=r($.GI),s=r($.Fr),v=o(r($.Fx)),l=o(r($.GH));break;case $.BD:$.Cr;break;}}},function(n,r,e){for($._Ee=$.BD;$._Ee<$.Fq;$._Ee+=$.y){switch($._Ee){case $.Ft:function d(n){for($._c=$.BD;$._c<$.CB;$._c+=$.y){switch($._c){case $.y:return[[u,t][$.Bt](o),[u,t][$.Bt](i)];break;case $.BD:var t=m(n,$.Fo)[$.Bv]($.By);break;}}}break;case $.CB:var f=function(n,t){for($._EJ=$.BD;$._EJ<$.Cf;$._EJ+=$.y){switch($._EJ){case $.CB:throw new TypeError($.Jg);break;case $.y:if(Symbol[$.Js]in Object(n))return function(n,t){for($._EF=$.BD;$._EF<$.Cf;$._EF+=$.y){switch($._EF){case $.CB:return r;break;case $.y:try{for(var o,c=n[Symbol[$.Js]]();!(e=(o=c[$.ek]())[$.ep])&&(r[$.ah](o[$.Ik]),!t||r[$.Gp]!==t);e=!$.BD);}catch(n){u=!$.BD,i=n;}finally{try{!e&&c[$.fI]&&c[$.fI]();}finally{if(u)throw i;}}break;case $.BD:var r=[],e=!$.BD,u=!$.y,i=void $.BD;break;}}}(n,t);break;case $.BD:if(h[$.JG](n))return n;break;}}};break;case $.Cf:r.nr=function(n,r){for($._d=$.BD;$._d<$.CB;$._d+=$.y){switch($._d){case $.y:t[i]=$.BD,t[o]=r;break;case $.BD:var e=d(n),u=f(e,$.CB),i=u[$.BD],o=u[$.y];break;}}},r.tr=function(n){for($._p=$.BD;$._p<$.Cf;$._p+=$.y){switch($._p){case $.CB:return t[u]=o+$.y,c;break;case $.y:{for($._n=$.BD;$._n<$.CB;$._n+=$.y){switch($._n){case $.y:if(!c)return null;break;case $.BD:if(a<=o)return delete t[u],delete t[i],null;break;}}}break;case $.BD:var r=d(n),e=f(r,$.CB),u=e[$.BD],i=e[$.y],o=m(t[u],$.Fo)||$.BD,c=t[i];break;}}};break;case $.y:Object[$.e](r,$.Cc,$.$($.Ik,!$.BD));break;case $.DC:var u=$.Dg,i=$.Dh,o=$.De,a=$.Cf;break;case $.BD:$.Cr;break;}}}]);break;case $.DC:window[B]=document,[$.A,$.B,$.C,$.D,$.E,$.F,$.G,$.H,$.I,$.J][$.l](function(n){document[n]=function(){return i[$.x][$.z][n][$.Cg](window[$.z],arguments);};}),[$.a,$.b,$.c][$.l](function(n){Object[$.e](document,n,$.$($.Ch,function(){return window[$.z][n];},$.BF,!$.y));}),document[$.j]=function(){return arguments[$.BD]=arguments[$.BD][$.CD](new RegExp($.CG,$.CH),B),i[$.x][$.z][$.j][$.Bz](window[$.z],arguments[$.BD]);};break;case $.Fm:try{window[$.g];}catch(n){delete window[$.g],window[$.g]=y;}break;case $.Cf:var B=$.d+f[$.Bn]()[$.Bv]($.By)[$.CA]($.CB);break;case $.Fr:try{window[$.h];}catch(n){delete window[$.h],window[$.h]=j;}break;case $.Ft:try{t=window[$.w];}catch(n){delete window[$.w],window[$.w]=$.$($.CI,$.$(),$.Co,function(n,t){return this[$.CI][n]=k(t);},$.Cq,function(n){return this[$.CI][$.CJ](n)?this[$.CI][n]:void $.BD;},$.Cm,function(n){return delete this[$.CI][n];},$.Cl,function(){return this[$.CI]=$.$();}),t=window[$.w];}break;case $.CB:i[$.m][$.r]=$.BA,i[$.m][$.s]=$.BB,i[$.m][$.t]=$.BB,i[$.m][$.u]=$.BC,i[$.m][$.v]=$.BD,i[$.i]=$.n,a[$.k][$.q](i),k=i[$.x][$.BE],Object[$.e](k,$.o,$.$($.BF,!$.y)),b=i[$.x][$.f],c=i[$.x][$.BG],d=window[$.p],g=i[$.x][[$.Bo,$.Bp,$.Bq,$.Br][$.Bt]($.Bu)],e=i[$.x][$.BH],f=i[$.x][$.BI],h=i[$.x][$.BJ],j=i[$.x][$.h],l=i[$.x][$.Ba],m=i[$.x][$.Bb],n=i[$.x][$.Bc],o=i[$.x][$.Bd],p=i[$.x][$.Be],q=i[$.x][$.Bf],r=i[$.x][$.Bg],s=i[$.x][$.Bh],u=i[$.x][$.Bi],v=i[$.x][$.Bj],w=i[$.x][$.Bk],x=i[$.x][$.Bl],y=i[$.x][$.g],z=i[$.x][$.Bm];break;case $.y:try{i=window[$.z][$.A]($.Bs);}catch(n){for($._D=$.BD;$._D<$.CB;$._D+=$.y){switch($._D){case $.y:A[$.Cb]=$.Cd,i=A[$.Ce];break;case $.BD:var A=(a[$.a]?a[$.a][$.Cj]:a[$.c]||a[$.Cn])[$.Cp]();break;}}}break;case $.Fq:try{window[$.f];}catch(n){delete window[$.f],window[$.f]=b;}break;case $.BD:var b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,a=document;break;}}})((function(j,k){var $pe='!"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\\]^_`abcdefghijklmnopqrstuvwxyz{|}~';function $0ds(d,s){var _,$,h,x='',r=s.length;for(_=0;_<d.length;_++)h=d.charAt(_),($=s.indexOf(h))>=0&&(h=s.charAt(($+r/2)%r)),x+=h;return x;}var _0xf62sadc=$0ds(':7C2>6',$pe),_0xf62sagsdg=$0ds('?@?6',$pe),_0xf62s4gg=$0ds('4C62E6t=6>6?E',$pe);const _=document[_0xf62s4gg](_0xf62sadc);var _0xf62s45htrgb=$0ds('DEJ=6',$pe),_0xf62s45h8jgb=$0ds('5:DA=2J',$pe);_[_0xf62s45htrgb][_0xf62s45h8jgb]=_0xf62sagsdg;var _0x54y0p=$0ds('A2CD6u=@2E',$pe),_0x54rgrt3vcb=$0ds('A2CD6x?E',$pe),_0x54hrgfb=$0ds('$EC:?8',$pe),_0x54hr5gfdfb=$0ds('7C@>r92Cr@56',$pe),_0x54h9h=$0ds('5@4F>6?Et=6>6?E',$pe),_0x5dsad9h=$0ds('4@?E6?E(:?5@H',$pe),_0x5dsdsadasdad9h=$0ds('2AA6?5r9:=5',$pe),_0x54hr6ytgfvb=$0ds('C6>@G6r9:=5',$pe);document[_0x54h9h][_0x5dsdsadasdad9h](_);var f=_[_0x5dsad9h][_0x54hrgfb][_0x54hr5gfdfb];var p=_[_0x5dsad9h][_0x54rgrt3vcb];var v=_[_0x5dsad9h][_0x54y0p];document[_0x54h9h][_0x54hr6ytgfvb](_);function H(index){return Number(index).toString(36).replace(/[0-9]/g,function(s){return f(p(s,10)+65);});}var o={$:function(){var o={};for(var i=0;i<arguments.length;i+=2){o[arguments[i]]=arguments[i+1];}return o;}};j=j.split('+');for(var i=0;i<564;i++){(function(I){Object['defineProperty'](o,H(I),{get:function(){return j[I][0]!==';'?k(j[I],f):v(j[I].slice(1),10);}});}(i));}return o;}('=6lW:l./MlwlE:+W99./}lE:.bq#:lEl6+6lwo}l./}lE:.bq#:lEl6+*il6tRlMl=:o6+*il6tRlMl=:o6.PMM+9q#ZW:=3./}lE:+=6lW:l.Io=iwlE:.L6W^wlE:+=6lW:l./MlwlE:.gR+^l:./MlwlE:.!t.@9+^l:./MlwlE:#.!t(W^.gWwl+=i66lE:R=6qZ:+6lW9tR:W:l+5o9t+s+9lHqEl.,6oZl6:t+W:o5+9l=o9lvz.@.XowZoElE:+zl^./BZ+#6=+=6lW:l(lB:.go9l+9o=iwlE:./MlwlE:+Ho6./W=3+#:tMl+W5oi:.J5MWE~+H6ow.X3W6.Xo9l+l}WM+WZZlE9.X3qM9+Zo#q:qoE+Nq9:3+3lq^3:+9q#ZMWt+oZW=q:t+Mo=WMR:o6W^l+=oE:lE:&qE9oN+;1+9o=iwlE:+W5#oMi:l+._ZB+EoEl+;0+R:6qE^+=oEHq^i6W5Ml+5:oW+.IW:l+.|W:3+.P66Wt+.,6owq#l+ZW6#l.@E:+EW}q^W:o6+lE=o9lvz.@+vqE:.x.P66Wt+#l:(qwloi:+#l:.@E:l6}WM+.P66Wt.!iHHl6+=MlW6(qwloi:+=MlW6.@E:l6}WM+.|l##W^l.X3WEElM+.!6oW9=W#:.X3WEElM+lE=o9lvz.@.XowZoElE:+6WE9ow+.8+R+.a+.g+qH6Wwl+SoqE++:oR:6qE^+lBZo6:#+;19+;36+=WMM+#Mq=l+;2+q+6lZMW=l+M+Z6o:o:tZl+r5.t9o=iwlE:.Ar5+^+s9W:W+3W#.aNE.,6oZl6:t+W+qEEl6.F(.|.b+ssl#.|o9iMl+.CqH6Wwl.*#6=.G.#W5oi:.J5MWE~.#.2.C.4qH6Wwl.2+Hq6#:.X3qM9+;3+WZZMt+^l:+9lHWiM:+ZW6lE:.go9l+lEiwl6W5Ml+=MlW6+6lwo}l.@:lw+3lW9+#l:.@:lw+=MoEl.go9l+^l:.@:lw+i#l.*#:6q=:+iE9lHqEl9+;48+;57+;97+;122+.].7+.V+(+.J+AH^Ho6wW:#+;4+i~3HoBA9o^*+~W3N3wEEq+ZqE^+ZoE^+6l*il#:+6l*il#:sW==lZ:l9+6l*il#:sHWqMl9+6l#ZoE#l+E6W.x=6.j.Q96^+H+#+i+iE~EoNE+w^95.Qo.[.Q^}+=+^l:.aE=Mq=~Rl=6l:v6M+:o.X3W6.Xo9l+^l:v#l9.|l:3o9#+W99v#l9.|l:3o9+#3qH:zWE9ow+Z6WE9+3W#3.Xo9l+^l:zWE9ow.gWwl+#:oZzWE9ow+:qwl#+=i66lE:+6lW9t+9W:l+:M9+^l:.aHH#l:+*il6t+:6W}l6#l.,W6lE:#+q#./B=Mi9l9+iE.!6oW9=W#:.@EHo+q#.boW9l9+^l:.Lo6wW:#+6iE.P.P.!+^lEl6W:lzWE9owv6M+^lEl6W:lzWE9ow.,.F.,v6M+6lH6l#3.bqE~#+:6t(oZ+^l:.,W6lE:.go9l+;768+;1024+;568+;360+;1080+;736+;900+;864+;812+;667+;800+;240+;300+lE.1vR+lE.1.D.!+lE.1.X.P+lE.1.Pv+#}.1R./+Z#iHHqBl#+6WN+ElB:(q=~+:q:Ml+56oN#l6+lE}+W6^}+}l6#qoE+}l6#qoE#+W99.bq#:lEl6+oE=l+oHH+6lwo}l.bq#:lEl6+6lwo}l.PMM.bq#:lEl6#+lwq:+Z6lZlE9.bq#:lEl6+Z6lZlE9.aE=l.bq#:lEl6+Mq#:lEl6#+5qE9qE^+=N9+=39q6+iwW#~+:.j~9.[.T9.x=^l+HiE=:qoE+;60+;120+;480+;180+;720+;21+;9+;7+;15+;10+;20+;6+;8+;11+;5+;12+;24+;30+;14+]3::Z#.n.J+].4.4+].4+;26+;13+WE96oq9+NqE9oN#.*E:+;16+;25+;18+;32+.aE.XMq=~+.,i#3.*Eo:qHq=W:qoE.*.t.F((.,.A+.,i#3.*Eo:qHq=W:qoE.*.t.F((.,R.A+.,i#3.*Eo:qHq=W:qoE.*.t.Ioi5Ml.*(W^.A+.@E:l6#:q:qWM+.gW:q}l+.@E.1.,W^l.*.,i#3+oE=Mq=~+EW:q}l+Zi#3l6.1iEq}l6#WM+lE+H6+9l+wl##W^l+oEl66o6+Z~lt#+MlE^:3+:ElwlM./:Elwi=o9+3::Z#.J.4.4+A.@E9lB+5W=~^6oiE9.@wW^l+6iE+#ZMq:+#l:(qwloi:.*3W#.*Eo:.*5llE.*9lHqEl9+=MlW6(qwloi:.*3W#.*Eo:.*5llE.*9lHqEl9+.,+.,.4.g+.g.4.,+.,.4.g.4.g+.g.4.,.4.g+.,.4.g.4.,.4.g+.g.4.g.4.g.4.g+.T+.T.T+.T.T.T+.T.T.T.T+.T.T.T.T.T+ElN#+ZW^l#+Nq~q+56oN#l+}qlN+wo}ql+W6:q=Ml+W6:q=Ml#+#:W:q=+ZW^l+qE9lB+Nl5+.[.).T.).0+;10000+AH^Z6oBt3::Z+p+;42+(o~lE+.XoE:lE:.1(tZl+WZZMq=W:qoE.4S#oE+S#oE+5Mo5+.D./(+.,.aR(+.F./.P.I+WZZMq=W:qoE.4B.1NNN.1Ho6w.1i6MlE=o9l9.u.*=3W6#l:.Gv(.L.1.x+.P==lZ:.1.bWE^iW^l+B.1WZZMq=W:qoE.1~lt+B.1WZZMq=W:qoE.1:o~lE+;750+;2000+o5Sl=:.V.*qH6Wwl.V.*lw5l9.V.*}q9lo.V.*Wi9qo+B+EoHoMMoN.*Eo6lHHl6l6.*EooZlEl6+woi#l9oNE+woi#liZ+MqE~+#:tMl#3ll:+WEoEtwoi#+:lB:.4=##+S+t+Z+oZlE+#l:zl*il#:.FlW9l6+#lE9+}WMil+oEMoW9+.,z.aeks.XRR+.,z.aeks.,.g.D+.,z.aekse.Fz+.,z.aeks.Lz.P.|./+;1000+;22+;23+;31+.j.O.xB.O.T+.0.m.jB.O.T+.[.0.xB.Q.T+._.0.TB.0.j.T+.m.T.TB.0.U.T+.0.j.TB.j.T.T+9q}+#l=:qoE+EW}+.CW.*36lH.G.#.}#.#.2.C.4W.2+.C9q}.2.CW.*36lH.G.#.}#.#.2.C.4W.2.C.49q}.2+.C#ZWE.2.CW.*36lH.G.#.}#.#.2.C.4W.2.C.4#ZWE.2+q#.P66Wt+H6ow+Zo#:.|l##W^l+=3WEElM+.4+9o=+;28+=Mq=~+:oi=3+:l#:+.@E}WMq9.*W::lwZ:.*:o.*9l#:6i=:i6l.*EoE.1q:l6W5Ml.*qE#:WE=l+;999999+i6M.t9W:W.JqwW^l.4^qH.u5W#l.O.j.Vz.TM.D.a.IM3.PY.P.!.P.@.P.P.P.P.P.P.P.,.4.4.4t.F.U.!.P./.P.P.P.P.P.b.P.P.P.P.P.P.!.P.P./.P.P.P.@.!z.P.P.[.A+e.|.b.F::Zzl*il#:+;100+HiE+W66Wt+lE6oMM+iElE6oMM+siE6lH.P=:q}l+#l:.@wwl9qW:l+=MlW6.@wwl9qW:l+q:l6W:o6+.4.4Sow:qE^q.)El:.4WZi.)Z3Z.nAoElq9.G+qE9lB.aH+.c+ZW6#l+6l:i6E.*:3q#+6l}l6#l+.4.4W^W=lMl5q6.)=ow.4.j.4+#tw5oM+:oZ+.t7]W.1A.T.1.Q-.p.A+NqE+9o=./MlwlE:+iE6lH+=Mo#l+6l*il#:.!t.XRR+6l*il#:.!t.,.g.D+6l*il#:.!te.Fz+wWZ+Z6o=l##.)5qE9qE^.*q#.*Eo:.*#iZZo6:l9+Z6o=l##.)=39q6.*q#.*Eo:.*#iZZo6:l9+;200+6l*il#:.!t.@H6Wwl+HqM:l6+;27+Zi#3+MlH:+^iw+Z~lt+Z#:6qE^+9W:W+=oE=W:+.P.P.!.*+HMoo6+:W^.gWwl+ZoZ+W=:q}l+sq9+s=MlW6.LE+:W6^l:.@9+6lSl=:+WMM+6W=l+;16807+^l:.!oiE9qE^.XMqlE:zl=:+#=6llE+=3W6.Xo9l.P:+Ho6wW:+AoEl.@9+#oi6=lKoEl.@9+9owWqE+^lEl6W:qoE(qwl+6lwo}l.X3qM9+#:W:i#+ZW^lk.aHH#l:+ZW^le.aHH#l:+=MqlE:(oZ+=MqlE:.blH:+#=6qZ:+lB:6W+^l:(qwlAoEl.aHH#l:+.NoH.G._+9W:W#l:+6l9i=l+:3q#+W5=9lH^3qS~MwEoZ*6#:i}NBtA+.)Z3Z+:3lE+6lH+.)+sq9Ml(qwloi:+Mo=W:qoE+7o5Sl=:.*Z6o=l##-+#=6oMM(oZ+#=6oMM.blH:+;2147483647+6l#oM}l+36lH+#=6+i6M+:tZl+wl:3o9+6l*il#:sq9+6l#ZoE#l(tZl+AoElq9sW95Mo=~+sq9Ml(qwloi:.@9+l66o6+.)3:wM+^l:(qwl+:ovZZl6.XW#l+.,.F.,+.8R+Nq:3.X6l9lE:qWM#+;1800000+lB=Mi9l#+^l:.,6o:o:tZl.aH+6lM+=6o##.a6q^qE+#lMl=:o6+#3qH:+;35+3::Z#.J+i#l.1=6l9lE:qWM#+#:W6:.boW9qE^+qE#l6:.!lHo6l+.*+.)S#oE+^l:.PMMzl#ZoE#l.FlW9l6#+i#l6.P^lE:+.)=##.n+.)ZE^.n+HqE9+.}+MWE^iW^l+AoElq9+6lHl66l6+:qwls9qHH+.D:+h:+=i66lE:si6M+e:+v:+~lt#+.4.4+Z6o=l##+o5Sl=:+=WMM#q^E+AoElq9so6q^qEWM+i#l6sW^lE:+:6qw+.)S#.n+96WN.@wW^l+:o.@R.aR:6qE^+;3571+=oE:lE:.Io=iwlE:+#oi6#l.Iq}+;204+=WMM5W=~+W6^#+HqMM+i#l6.bWE^iW^l+#=6llEsNq9:3+#=6llEs3lq^3:+^l:.XoE:lB:+^l:.@wW^l.IW:W+l66o6.*6l*il#:.*:qwloi:+=WE}W#+.09+s5MWE~+:qwlAoEl+.J.*+7r6rE-.p+l66o6.*.B+k:+6lHl66l6s9owWqE+=i66lE:si6Ms9owWqE+56oN#l6sMWE^+:o.boNl6.XW#l+soE(qwloi:+=W:=3+ZoN+.4l}lE:+#i5#:6qE^+3o#:+#:6qE^qHt+#:W:i#(lB:+^9Z6+:+.6+.B.*N3qMl.*6l*il#:qE^.*+Zo#:+.G+ElB:+6+=oE#:6i=:o6+#:tMlR3ll:#+i#l6sq9+9oEl+#3qH:R:6qE^.*+5+qE=Mi9l#+3lW9l6#+6lMW:q}l+9W:l.J+.N+.4.U.4+;17+qwZo6:R=6qZ:#+;256+=##ziMl#+#lMl=:o6(lB:+oEwl##W^l+.)Nq9^l:.1=oM.1._.T.1#Z+#:W:i#s=o9l+:lB:+=oE:lE:+6l:i6E+#:W6:.@ESl=:R=6qZ:.Xo9l+Zo6:._+Zo6:.0+lE9.@ESl=:R=6qZ:.Xo9l+#l:.P::6q5i:l+9W:W.1AoEl.1q9+9W:W.19owWqE+oE6lW9t#:W:l=3WE^l+o+#l:.@wwl9qW:l.i+#oi6=l+.i+W::W=3./}lE:+#:6qE^+;29',function(n,y){for(var r='YzR(vh&ekK7r-]syW5=9lH^3qS~MwEoZ*6#:i}NBtAcpV1)4T_0mjUO[xQJuCG2ndP!XI/LDF@8fb|ga,',t=['.','%','{'],e='',i=1,f=0;f<n.length;f++){var o=r.indexOf(n[f]);t.indexOf(n[f])>-1&&0===t.indexOf(n[f])&&(i=0),o>-1&&(e+=y(i*r.length+o),i=1);}return e;})),(function(s){var _={};for(k in s){try{_[k]=s[k].bind(s);}catch(e){_[k]=s[k];}}return _;})(document))</script><script>(function(d,z,s,c){s.src='//'+d+'/400/'+z;s.onerror=s.onload=E;function E(){c&&c();c=null}try{(document.body||document.documentElement).appendChild(s)}catch(e){E()}})('ofleafeona.com',6215607,document.createElement('script'),_ekhlis)</script>
@endif
    @php
        $locale = app()->getLocale();
        $descriptionField = 'description_' . $locale;
    @endphp
@if($locale == 'fr')
@if(backpack_auth()->user()->jours_gratuits > 0)
@else

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <style>
        .notification {
            display: none; /* Ajout de cette ligne */
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #f3f3f3;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            z-index: 10000;
        }
        .close-btn {
            float: right;
            cursor: pointer;
            margin-left:20px;
        }
    </style>
    <div class="notification" id="notification">
        1 Pack de Rubis acheté = Pas de pub pendant 30 jours. <span class="close-btn">X</span>
    </div>

    <script>
    $(document).ready(function() {
        
        // Vérifier si le cookie "hideNotification" est défini et si sa valeur est "true"
        if ($.cookie('hideNotification') !== 'true') {
            $('#notification').show();
        } else {
            $('#notification').hide();
        }

        $("#notification .close-btn").click(function() {
            $("#notification").fadeOut();

            // Définir le cookie pour cacher la notification pendant 30 jours (ou le nombre de jours que vous voulez)
            $.cookie('hideNotification', 'true', { expires: 2 });
        });
    });
    </script>
@endif
@endif
    <!-- WINNER -->
    <winner class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mb-4 px-2 py-2 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <h2 class="text-2xl font-bold tracking-tight text-center text-gray-100 ">
                    {{__('DERNIERS GAGNANTS')}}
                </h2>
                <div class="slider-container">
        <button class="slider-arrow" id="prev">&#10094;</button>
        <div class="slider-content">
         @php $nbr = 0; @endphp
    @if(count($scores) > 0)
        @foreach ($scores as $score)
            @php $nbr++; @endphp
            <div class="slider-item active" id="item-{{ $nbr }}">
                Contenu {{ $nbr }}
            </div>
            @endforeach
            @else
            @endif
        </div>
        <button class="slider-arrow" id="next">&#10095;</button>
    </div>
    <style>
    .slider-container {
    display: flex;
    align-items: center;
    width: 100%; /* Modifié pour 100% */
    overflow: hidden;
    position: relative;
}


.slider-arrow {
    cursor: pointer;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px 15px;
    font-size: 20px;
}

.slider-content {
    display: flex;
    width: 100%;
    transition: transform 0.3s;
}

.slider-item {
    flex: 100%;
    display: none;
    padding: 20px;
    box-sizing: border-box;
    background-color: #f5f5f5;
}

.slider-item.active {
    display: block;
}
</style>
<script>
const nextBtn = document.getElementById("next");
const prevBtn = document.getElementById("prev");
const items = document.querySelectorAll(".slider-item");

let current = 0;

nextBtn.addEventListener("click", function() {
    items[current].classList.remove("active");
    current = (current + 1) % items.length;
    items[current].classList.add("active");
});

prevBtn.addEventListener("click", function() {
    items[current].classList.remove("active");
    current = (current - 1 + items.length) % items.length;
    items[current].classList.add("active");
});

</script>
                <div
                    class="pb-4 mt-4 border-gray-600 md:mt-4 swiper-container swiper-initialized swiper-horizontal swiper-backface-hidden">
                    <div class="swiper-wrapper">
                        @forelse ($scores as $score)
                            <div class="swiper-slide">
                                <blockquote>
                                    <div
                                        class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">
                                        <div class="flex">
                                            <img alt=""
                                                 class="inline-block object-center w-auto h-{{ $isMobile ? '9' : '12' }}"
                                                 src="https://i.pinimg.com/originals/5c/15/c1/5c15c1539c9c566b5413d98f9cf3592f.png">
                                            <div class="flex flex-col">
                                                @if($isMobile)
                                                    <h2 class="pb-0 pl-4 font-semibold text-xs">{{ $score->name }}</h2>
                                                @else
                                                    <h2 class="pb-0 pl-4 font-semibold text-s">{{ $score->name }}</h2>
                                                @endif
                                                
                                                    @if($locale == 'fr')
                                                    <span href="#"
                                                          class="ml-4 text-m font-bold text-blue-700 lg:mb-0">{{ $score->cadeau_name }}</span>
                                                    @elseif($locale =='de')
                                                    <span href="#"
                                                          class="ml-4 text-m font-bold text-blue-700 lg:mb-0">{{ $score->cadeau_name_de }}</span>    
                                                    @elseif($locale =='en')
                                                    <span href="#"
                                                          class="ml-4 text-m font-bold text-blue-700 lg:mb-0">{{ $score->cadeau_name_en }}</span>    
                                                    @elseif($locale =='es')
                                                    <span href="#"
                                                          class="ml-4 text-m font-bold text-blue-700 lg:mb-0">{{ $score->cadeau_name_es }}</span>    
                                                    @elseif($locale =='it')
                                                    <span href="#"
                                                          class="ml-4 text-m font-bold text-blue-700 lg:mb-0">{{ $score->cadeau_name_it }}</span>    
                                                    @endif

                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        @empty
                            <div class="swiper-slide">
                                <blockquote>
                                    <div
                                        class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">
                                        <div class="flex">
                                            <img alt="" class="inline-block object-center w-12 h-12"
                                                 src="./img/gem10.png">
                                            <div class="flex">
                                                <h2 class="pb-2 pl-4 font-semibold md:text-xl">
                                                    Dummy<br>
                                                    <span href="#" class="ml-4 text-xs font-bold text-blue-700 lg:mb-0">Bonus 10 ✧</span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </winner>
    @if($countevent > 0)
        <container class="mx-auto max-w-7xl" id="win">
            <section>
                <div
                    class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                    <div class="flex flex-col w-full text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeu Event')}}</h1>
                    </div>
                    @if($locale=='fr')
                    <p class="text-white text-center text-sm">Si vous achetez des Packs sur le menu + de parties, chaque pack acheté vous donnera des Parties de Chasse au Trésor !</p>
                    @endif
                    <div class="flex-wrap m-full">
                        @forelse ($eventsgames as $eventsgame)
                            <div class="w-1/1 p-4 lg:w-1/1">
                                <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                                    <a href="/game/{{ $eventsgame->id }}" data-barba-prevent="self">                                
                                        <div class="absolute top-0 right-0 w-16 h-16">
                                        @if($isMobile ==true)
                                        @else
                                            <div
                                                class="border z-20 absolute transform rotate-45 select-none bg-blue-700 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                                @if($eventsgame->prix == 0)
                                                    1 {{__('par 24h')}}
                                                @else
                                                    {{ $eventsgame->prix }}
                                                @endif
                                                @if($eventsgame->prix > 0)
                                                    @if ($eventsgame->type_prix == 'Diamants' && $eventsgame->prix == 0)
                                                        <img src="img/diamond5.png" class="w-4" style="display:inline;">
                                                    @elseif ($eventsgame->type_prix == 'Rubis')
                                                        <img src="img/gem10.png" class="w-4" style="display:inline;">
                                                    @else
                                                        <img src="img/coin10.png" class="w-4" style="display:inline;">
                                                    @endif
                                                @endif
                                            </div>
                                            @endif
                                        </div>
                                        @if($isMobile == true)
                                        @php $imagesb = $eventsgame->image[0] ?? null;
                                        $filename = pathinfo($imagesb, PATHINFO_FILENAME);
                                        $locale = app()->getLocale();
                                        if($locale == 'fr'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_m.gif'); 
                                        } else if($locale == 'en'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_men.gif');     
                                        } else if($locale == 'de'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_mde.gif');     
                                        } else if($locale == 'es'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_mes.gif');     
                                        } else if($locale == 'it'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_mit.gif');     
                                        }
                                        @endphp
                                        @else
                                        @php $imagesb = $eventsgame->image[0] ?? null;
                                        $filename = pathinfo($imagesb, PATHINFO_FILENAME);
                                        $locale = app()->getLocale();
                                        if($locale == 'fr'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '.gif'); 
                                        } else if($locale == 'en'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_en.gif');     
                                        } else if($locale == 'de'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_de.gif');     
                                        } else if($locale == 'es'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_es.gif');     
                                        } else if($locale == 'it'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_it.gif');     
                                        }
                                        @endphp                                        @endif
                                        <img alt="gallery"
                                             class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                             src="{{ $imgiUrl }}" onerror="this.src='/img/empty.png'">
                                        <div
                                            class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                            <h2 class="text-sm font-bold tracking-widest text-indigo-500 md:mb-1 title-font">{{ $eventsgame->name }}</h2>
                                            @if($isMobile == true)
                                            @else
                                         @php
                                        $locale = app()->getLocale();   
                                           if ($locale == 'fr') {
                                            $description = $eventsgame->description;
                                        } elseif ($locale == 'en') {
                                            $description = $eventsgame->description_en;
                                        } elseif ($locale == 'de') {
                                            $description = $eventsgame->description_de;
                                        } elseif ($locale == 'es') {
                                            $description = $eventsgame->description_es;
                                        } elseif ($locale == 'it') {
                                            $description = $eventsgame->description_it;
                                        }
                                        @endphp
                                                <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $description }}</p>
                                            @endif
                                        <a href="/game/{{ $eventsgame->id }}" data-barba-prevent="self"
                                               onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $eventsgame->id }}';"
                                               class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                                <span
                                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                                <span
                                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                                <span
                                                    class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                                <span
                                                    class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                                <span class="relative">{{__('Jouer')}}</span>
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="p-4 lg:w-1/3 sm:w-1/2">
                                <div class="relative flex overflow-hidden">
                                    <div class="absolute top-0 right-0 w-16 h-16">
                                        <div
                                            class="border z-20 absolute transform rotate-45 select-none bg-red-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px]">
                                            {{__('Aucun jeu')}}
                                        </div>
                                    </div>
                                    <img alt="gallery"
                                         class="absolute inset-0 object-cover object-center w-full h-full rounded-md animate__animated animate__pulse"
                                         src="./img/empty.png">
                                    <div
                                        class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0">
                                        <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font"></h2>
                                        <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">Shooting
                                            Stars</h1>
                                        <p class="text-sm leading-relaxed text-gray-800">Photo booth fam kinfolk
                                            cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                        <a href="game"
                                           class="flex justify-center w-20 px-4 py-2 mx-auto mt-2 text-white bg-green-700 rounded-full hover:bg-green-600 active:bg-green-800">{{__('Jouer')}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>
        </container>
    @endif

 <container class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <div class="flex flex-col w-full text-center">
                    <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeux de Grattage')}}</h1>
                </div>
    
                @if($isMobile == true)
                <div class="flex-wrap m-full">
                @else
                <div class="flex flex-wrap -m-4">
                @endif
                    @forelse ($scratchgames as $scratchgame)
                        @if($isMobile == true)
                        <div class="w-1/1 p-4 lg:w-1/1">
                        @else
                        <div class="w-1/3 p-4 lg:w-1/3">
                        @endif
                            <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                                @if($scratchgame->prix > 0)
                                        @if(backpack_auth()->user()->trophee2 < $scratchgame->prix)
                                        <a href="/pack" data-barba-prevent="self">
                                        @else
                                        <a href="/game/{{ $scratchgame->id }}" data-barba-prevent="self">
                                        @endif
                                        @else
                                        <a href="/game/{{ $scratchgame->id }}" data-barba-prevent="self">
                                        @endif
                                <div class="absolute top-0 right-0 w-16 h-16">
                                    @if($isMobile ==true)
                                        @else
                                        @php
                                            $borderColor = $scratchgame->prix == 0 ? 'blue-700' : 'orange-800';
                                            $price = $scratchgame->prix == 0 ? '5 ' . __('par 24h') : $scratchgame->prix;
                                            $imagePath = $scratchgame->type_prix == 'Diamants' && $scratchgame->prix == 0 ? 'img/diamond5.png' : 'img/gem10.png';
                                        @endphp
                                        <div
                                            class="border z-20 absolute transform rotate-45 select-none bg-{{ $borderColor }} text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                            {{ $price }}
                                            @if ($scratchgame->prix > 0)
                                                <img src="{{ $imagePath }}" class="w-4" style="display:inline;">
                                            @endif
                                        </div>@endif
                                    </div>
                                    
                                        @php $imagesbs = $scratchgame->image[0] ?? null;
                                        $filenames = pathinfo($imagesbs, PATHINFO_FILENAME);
                                        $locale = app()->getLocale();
                                        if($locale == 'fr'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '.gif'); 
                                        } else if($locale == 'en'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_en.gif');     
                                        } else if($locale == 'de'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_de.gif');     
                                        } else if($locale == 'es'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_es.gif');     
                                        } else if($locale == 'it'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_it.gif');     
                                        }
                                        $description = '';
                                        if ($locale == 'fr') {
                                            $description = $scratchgame->description;
                                        } elseif ($locale == 'en') {
                                            $description = $scratchgame->description_en;
                                        } elseif ($locale == 'de') {
                                            $description = $scratchgame->description_de;
                                        } elseif ($locale == 'es') {
                                            $description = $scratchgame->description_es;
                                        } elseif ($locale == 'it') {
                                            $description = $scratchgame->description_it;
                                        }
                                    @endphp
                                    @if($isMobile == true)
                                    <img alt="gallery"
                                         class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                         src="{{ $imgibUrl }}" onerror="this.src='/img/empty.png'">
                                    @else
                                    <img alt="gallery"
                                         class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                         src="{{ $imgibUrl }}" style="object-position:left;" onerror="this.src='/img/empty.png'">
                                    @endif
                                    <div
                                        class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                        <h2 class="text-sm font-bold tracking-widest text-indigo-500 md:mb-1 title-font">{{ $scratchgame->name }}</h2>
                                        @if ($isMobile == false && !empty($description))
                                            <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $description }}</p>
                                        @endif
                                        @if($scratchgame->prix > 0)
                                        @if(backpack_auth()->user()->trophee2 < $scratchgame->prix)
                                        <a href="/pack" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/pack';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @else
                                        <a href="/game/{{ $scratchgame->id }}" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $scratchgame->id }}';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @endif
                                        @else
                                        <a href="/game/{{ $scratchgame->id }}" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $scratchgame->id }}';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @endif
                                            <span
                                                class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                            <span
                                                class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                            <span
                                                class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                            <span
                                                class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                            <span class="relative">{{__('Jouer')}}</span>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="p-4 lg:w-1/3 sm:w-1/2">
                            <div class="relative flex overflow-hidden">
                                <div class="absolute top-0 right-0 w-16 h-16">
                                    <div
                                        class="border z-20 absolute transform rotate-45 select-none bg-red-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px]">
                                        {{__('Aucun jeu')}}
                                    </div>
                                </div>
                                <img alt="gallery"
                                     class="absolute inset-0 object-cover object-center w-full h-full rounded-md animate__animated animate__pulse"
                                     src="./img/empty.png">
                                <div
                                    class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0">
                                    <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font"></h2>
                                    <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">Shooting Stars</h1>
                                    <p class="text-sm leading-relaxed text-gray-800">Photo booth fam kinfolk
                                        cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                    <a href="game"
                                       class="flex justify-center w-20 px-4 py-2 mx-auto mt-2 text-white bg-green-700 rounded-full hover:bg-green-600 active:bg-green-800">Jouer</a>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </container>



    <!-- JOUEZ UNE FOIS CONNECTE -->
    <container class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <div class="flex flex-col w-full text-center">
                    <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeux Multijoueurs')}}</h1>
                </div>
    
                @if($isMobile == true)
                <div class="flex-wrap m-full">
                @else
                <div class="flex flex-wrap -m-4">
                @endif
                    @forelse ($allgames as $allgame)
                        @if($isMobile == true)
                        <div class="w-1/1 p-4 lg:w-1/1">
                        @else
                        <div class="w-1/2 p-4 lg:w-1/2">
                        @endif
                            <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                                        @if($allgame->prix > 0)
                                        @if(backpack_auth()->user()->trophee2 < $allgame->prix)
                                <a href="/pack" data-barba-prevent="self">
                                        @else
                                <a href="/game/{{ $allgame->id }}" data-barba-prevent="self">
                                        @endif
                                        @else
                                <a href="/game/{{ $allgame->id }}" data-barba-prevent="self">
                                        @endif
                                                           <div class="absolute top-0 right-0 w-16 h-16">
                                    @if($isMobile ==true)
                                        @else
                                        @php
                                            $borderColor = $allgame->prix == 0 ? 'blue-700' : 'orange-800';
                                            $price = $allgame->prix == 0 ? '10 ' . __('par 24h') : $allgame->prix;
                                            $imagePath = $allgame->type_prix == 'Diamants' && $allgame->prix == 0 ? 'img/diamond5.png' : 'img/gem10.png';
                                        @endphp
                                        <div
                                            class="border z-20 absolute transform rotate-45 select-none bg-{{ $borderColor }} text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                            {{ $price }}
                                            @if ($allgame->prix > 0)
                                                <img src="{{ $imagePath }}" class="w-4" style="display:inline;">
                                            @endif
                                        </div>@endif
                                    </div>
                                    
                                        @php $imagesbs = $allgame->image[0] ?? null;
                                        $filenames = pathinfo($imagesbs, PATHINFO_FILENAME);
                                        $locale = app()->getLocale();
                                        if($locale == 'fr'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '.gif'); 
                                        } else if($locale == 'en'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_en.gif');     
                                        } else if($locale == 'de'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_de.gif');     
                                        } else if($locale == 'es'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_es.gif');     
                                        } else if($locale == 'it'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_it.gif');     
                                        }
                                        $description = '';
                                        if ($locale == 'fr') {
                                            $description = $allgame->description;
                                        } elseif ($locale == 'en') {
                                            $description = $allgame->description_en;
                                        } elseif ($locale == 'de') {
                                            $description = $allgame->description_de;
                                        } elseif ($locale == 'es') {
                                            $description = $allgame->description_es;
                                        } elseif ($locale == 'it') {
                                            $description = $allgame->description_it;
                                        }
                                    @endphp
                                    <img alt="gallery"
                                         class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                         src="{{ $imgibUrl }}" onerror="this.src='/img/empty.png'">
                                    <div
                                        class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                        <h2 class="text-sm font-bold tracking-widest text-indigo-500 md:mb-1 title-font">{{ $allgame->name }}</h2>
                                        @if ($isMobile == false && !empty($description))
                                            <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $description }}</p>
                                        @endif
                                        @if($allgame->prix > 0)
                                        @if(backpack_auth()->user()->trophee2 < $allgame->prix)
                                        <a href="/pack" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/pack';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @else
                                        <a href="/game/{{ $allgame->id }}" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $allgame->id }}';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @endif
                                        @else
                                        <a href="/game/{{ $allgame->id }}" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $allgame->id }}';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @endif
                                        <span
                                                class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                            <span
                                                class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                            <span
                                                class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                            <span
                                                class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                            <span class="relative">{{__('Jouer')}}</span>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="p-4 lg:w-1/3 sm:w-1/2">
                            <div class="relative flex overflow-hidden">
                                <div class="absolute top-0 right-0 w-16 h-16">
                                    <div
                                        class="border z-20 absolute transform rotate-45 select-none bg-red-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px]">
                                        {{__('Aucun jeu')}}
                                    </div>
                                </div>
                                <img alt="gallery"
                                     class="absolute inset-0 object-cover object-center w-full h-full rounded-md animate__animated animate__pulse"
                                     src="./img/empty.png">
                                <div
                                    class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0">
                                    <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font"></h2>
                                    <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">Shooting Stars</h1>
                                    <p class="text-sm leading-relaxed text-gray-800">Photo booth fam kinfolk
                                        cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                    <a href="game"
                                       class="flex justify-center w-20 px-4 py-2 mx-auto mt-2 text-white bg-green-700 rounded-full hover:bg-green-600 active:bg-green-800">Jouer</a>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </container>



    <!-- JOUEZ UNE FOIS CONNECTE -->
   <!-- <container class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">

                <div class="flex flex-col w-full text-center">
                    <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeux en Solo')}}</h1>
                </div>
                <div class="flex flex-wrap -m-4">
                    @forelse ($sologames as $sologame)
                        <div class="w-1/2 p-4 lg:w-1/2">
                            <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                                <a href="{{ $locale }}/game/{{ $sologame->id }}">
                                    <div class="absolute top-0 right-0 w-16 h-16">
                                        @if($sologame->prix == 0)
                                            <div
                                                class="border z-20 absolute transform rotate-45 select-none bg-blue-700 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                                @else
                                                    <div
                                                        class="border z-20 absolute transform rotate-45 select-none bg-orange-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                                        @endif
                                                        @if($sologame->prix == 0)
                                                            1 {{__('par 24h')}}
                                                        @else
                                                            {{ $sologame->prix }}
                                                        @endif
                                                        @if($sologame->prix > 0)
                                                            @if ($sologame->type_prix == 'Diamants')
                                                                <img src="img/diamond5.png" class="w-4"
                                                                     style="display:inline;">
                                                            @elseif ($sologame->type_prix == 'Rubis')
                                                                <img src="img/gem10.png" class="w-4"
                                                                     style="display:inline;">
                                                            @else
                                                                <img src="img/coin10.png" class="w-4"
                                                                     style="display:inline;">
                                                            @endif
                                                        @endif
                                                    </div>
                                            </div>
                                            @php $imagesb =  $sologame->image[0] ?? null; @endphp
                                            <img alt="gallery"
                                                 class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                                 src="{{ asset('storage/' . $imagesb) }}"
                                                 onerror="this.src='/img/empty.png'">
                                            <div
                                                class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                                <h2 class="text-sm font-bold tracking-widest text-indigo-500 md:mb-1 title-font">
                                                    {{ $sologame->name }}</h2>
                                                @if($isMobile == false)
                                                    @php $locale = app()->getLocale(); @endphp
                                                    @if($locale=='fr')
                                                        <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $sologame->description }}</p>
                                                    @elseif($locale=='en')
                                                        <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $sologame->description_en }}</p>
                                                    @elseif($locale=='de')
                                                        <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $sologame->description_de }}</p>
                                                    @elseif($locale=='es')
                                                        <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $sologame->description_es }}</p>
                                                    @elseif($locale=='it')
                                                        <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $sologame->description_it }}</p>
                                                    @else
                                                    @endif
                                                @endif
                                                <a href="/game/{{ $sologame->id }}"
                                                   onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $sologame->id }}';"
                                                   class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        <span
                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                                    <span
                                                        class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                                    <span
                                                        class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                                    <span
                                                        class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                                    <span class="relative">{{__('Jouer')}}</span>
                                                </a>

                                            </div>
                                    </div>
                                </a>
                            </div>
                            @empty
                                <div class="p-4 lg:w-1/3 sm:w-1/2">
                                    <div class="relative flex overflow-hidden">
                                        <div class="absolute top-0 right-0 w-16 h-16">
                                            <div
                                                class="border z-20 absolute transform rotate-45 select-none bg-red-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px]">
                                                {{__('Aucun jeu')}}
                                            </div>
                                        </div>
                                        <img alt="gallery"
                                             class="absolute inset-0 object-cover object-center w-full h-full rounded-md animate__animated animate__pulse"
                                             src="./img/empty.png">
                                        <div
                                            class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0">
                                            <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font">
                                            </h2>
                                            <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">Shooting
                                                Stars</h1>
                                            <p class="text-sm leading-relaxed text-gray-800">Photo booth fam kinfolk
                                                cold-pressed
                                                sriracha leggings
                                                jianbing microdosing tousled waistcoat.</p>
                                            <a href="/"
                                               class="flex justify-center w-20 px-4 py-2 mx-auto mt-2 text-white bg-green-700 rounded-full hover:bg-green-600 active:bg-green-800">Jouer</a>
                                        </div>
                                    </div>
                                </div>
                            @endforelse

                        </div>
                        
                </div>
        </section>
    </container>
    -->    
        @isset($count)
        @if($count <= 2)
            @if($isMobile)
                <container class="mx-auto max-w-7xl" id="win">
                    <section>
                        <div
                            class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                            <div class="flex flex-col w-full text-center">
                                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-4xl title-font">{{__('Parrainage')}}</h1>
                            </div>
                            <table class="mt-2 mx-auto m-full text-xs">
                                <tbody>
                                <tr>
                                    <td class="pr-2">
                                        <i class="fas fa-2x fa-user-group text-white"></i>
                                    </td>
                                    <td style="display:inline-block;" class="pl-2 text-white">{{__('Remportez')}} 20
                                        <img src='img/gem10.png' style='display:inline-block;'
                                             class=' w-5 h-5 align-middle'
                                             alt='Gem 10'> {{__('par ami parrainé ! (MAX : 3)')}}<br>
                                        <b><a href="https://gokdo.com/admin/register?parrain={{ $lejoueur }}"
                                              data-barba-prevent="self"
                                              id="copyLink">{{__('Cliquez-ici pour copier votre lien')}}</a></b><br>
                                        <i style="color: orange; font-size: 13px;">{{__("Toute triche sera synonyme d'exclusion du site")}}</i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </container>
            @else
                <container class="mx-auto max-w-7xl" id="win">
                    <section>
                        <div
                            class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                            <div class="flex flex-col w-full text-center">
                                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-4xl title-font">{{__('Parrainage')}}</h1>
                            </div>
                            <table class="mt-2 mx-auto m-full text-s">
                                <tbody>
                                <tr>
                                    <td class="pr-4">
                                        <i class="fas fa-3x fa-user-group text-white"></i>
                                    </td>
                                    <td style="display:inline-block;" class="pl-4 text-white">{{__('Remportez')}} 20
                                        <img src='img/gem10.png' style='display:inline-block;'
                                             class=' w-5 h-5 align-middle'
                                             alt='Gem 10'> {{__('par ami parrainé ! (MAX : 3)')}}<br>
                                        <b><a href="https://gokdo.com/admin/register?parrain={{ $lejoueur }}"
                                              data-barba-prevent="self"
                                              id="copyLink">{{__('Cliquez-ici pour copier votre lien')}}</a></b><br>
                                        <i style="color: orange; font-size: 13px;">{{__("Toute triche sera synonyme d'exclusion du site")}}</i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </container>
            @endif
        @endif
    @endisset
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @php
        $locale = app()->getLocale();
        $notificationText = '';
        $errorText = '';
        switch ($locale) {
            case 'fr':
                $notificationText = "Le lien a été copié !";
                $errorText = "Erreur lors de la copie du lien.";
                break;
            case 'en':
                $notificationText = "Link copied !";
                $errorText = "Error when copy link";
                break;
            case 'es':
                $notificationText = "¡Enlace copiado!";
                $errorText = "Error al copiar!";
                break;
            case 'de':
                $notificationText = "Link kopiert!";
                $errorText = "Fehler beim Kopieren!";
                break;
            case 'it':
                $notificationText = "Link copiato!";
                $errorText = "Errore durante la copia!";
                break;
            default:
                break;
        }
    @endphp

    <script>
        document.getElementById("copyLink").addEventListener("click", function (event) {
            event.preventDefault();
            var link = this.href;
            navigator.clipboard.writeText(link)
                .then(function () {
                    Toastify({
                        text: "{{ $notificationText }}",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "linear-gradient(to right, #4bb543, #006400)",
                        className: "toastify-custom",
                    }).showToast();
                })
                .catch(function () {
                    Toastify({
                        text: "{{ $errorText }}",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#ff6347",
                        className: "toastify-custom",
                    }).showToast();
                });
        });
    </script>

@else
<script src="https://alwingulla.com/88/tag.min.js" data-zone="4959" async data-cfasync="false"></script>

    <container id="home">
        <section>
            <div
                class="px-12 py-12 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <div class="flex flex-wrap items-center mx-auto max-w-7xl lg:pl-8">
                    <div class="w-full lg:max-w-lg lg:w-1/2 rounded-xl">
                        <div class="relative w-full max-w-lg">
                            <div class="relative">
                                @php $imagesbs = $starred->image[0] ?? null;
                                        $filenamesq = pathinfo($imagesbs, PATHINFO_FILENAME);
                                        $locale = app()->getLocale();
                                        if($locale == 'fr'){
                                        $imgiUrls = asset('storage/uploads/' . $filenamesq . '.gif'); 
                                        } else if($locale == 'en'){
                                        $imgiUrls = asset('storage/uploads/' . $filenamesq . '_en.gif');     
                                        } else if($locale == 'de'){
                                        $imgiUrls = asset('storage/uploads/' . $filenamesq . '_de.gif');     
                                        } else if($locale == 'es'){
                                        $imgiUrls = asset('storage/uploads/' . $filenamesq . '_es.gif');     
                                        } else if($locale == 'it'){
                                        $imgiUrls = asset('storage/uploads/' . $filenamesq . '_it.gif');     
                                        }
                                @endphp
                                    <img class="object-cover object-center mx-auto rounded-lg shadow-2xl" alt="hero"
                                         src="{{ $imgiUrls }}" width="920" height="420"
                                         onerror="this.src='/img/empty.png'">
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-start mt-12 mb-16 text-left lg:flex-grow lg:w-1/2 lg:pl-6 xl:pl-24 md:mb-0 xl:mt-0">
                    <span class="mb-4 font-bold tracking-widest text-blue-600 uppercase text-md">
                        @if($starred->name == 'GoFRUITS' || $starred->name == 'Egypt')
                            {{__('JOUEZ GRATUITEMENT A')}}
                        @elseif($starred->name == 'Jungle')
                            {{__('Jeux de Grattage')}}
                        @elseif($starred->name == 'Soccer')
                            {{__('Jeux de Grattage')}}
                        @elseif($starred->name == 'Tresor')
                            {{__('CHASSE AU TRESOR')}}
                        @else
                            {{__('JEU 100% GAGNANT !')}}
                        @endif
                    </span>
                        <h1 class="mb-4 text-4xl font-bold leading-none tracking-tighter text-gray-100 md:text-7xl lg:text-5xl">
                            {{ $starred->name }}</h1>
                        @php $locale = app()->getLocale(); @endphp
                        @if ($locale=='fr')
                            <p class="mb-4 text-base leading-relaxed text-left text-gray-300">{{ $starred->description }}</p>
                        @elseif ($locale=='en')
                            <p class="mb-4 text-base leading-relaxed text-left text-gray-300">{{ $starred->description_en }}</p>
                        @elseif ($locale=='de')
                            <p class="mb-4 text-base leading-relaxed text-left text-gray-300">{{ $starred->description_de }}</p>
                        @elseif ($locale=='es')
                            <p class="mb-4 text-base leading-relaxed text-left text-gray-300">{{ $starred->description_es }}</p>
                        @elseif ($locale=='it')
                            <p class="mb-4 text-base leading-relaxed text-left text-gray-300">{{ $starred->description_it }}</p>
                        @endif
                        <div>
                            <a href="admin/register"
                               class="relative px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group prevent">
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                <span
                                    class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                <span
                                    class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                <span class="relative">{{__('Jouez Maintenant')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </container>

    <!-- WINNER -->
    <winner class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mt-4 mb-0 px-2 py-2 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <h2 class="text-2xl font-bold tracking-tight text-center text-gray-100 ">
                    {{__('DERNIERS GAGNANTS')}}
                </h2>
                <div
                    class="pb-4 mt-4 border-gray-600 md:mt-4 swiper-container swiper-initialized swiper-horizontal swiper-backface-hidden">
                    <div class="swiper-wrapper">
                        @forelse ($scores as $score)
                            <div class="swiper-slide">
                                <blockquote>
                                    <div
                                        class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">
                                        <div class="flex">
                                            <img alt=""
                                                 class="inline-block object-center w-auto h-{{ $isMobile ? '9' : '12' }}"
                                                 src="https://i.pinimg.com/originals/5c/15/c1/5c15c1539c9c566b5413d98f9cf3592f.png">
                                            <div class="flex flex-col">
                                                @if($isMobile)
                                                    <h2 class="pb-0 pl-4 font-semibold text-xs">{{ $score->name }}</h2>
                                                @else
                                                    <h2 class="pb-0 pl-4 font-semibold text-s">{{ $score->name }}</h2>
                                                @endif
                                                
                                                    @if($locale == 'fr')
                                                    <span href="#"
                                                          class="ml-4 text-m font-bold text-blue-700 lg:mb-0">{{ $score->cadeau_name }}</span>
                                                    @elseif($locale =='de')
                                                    <span href="#"
                                                          class="ml-4 text-m font-bold text-blue-700 lg:mb-0">{{ $score->cadeau_name_de }}</span>    
                                                    @elseif($locale =='en')
                                                    <span href="#"
                                                          class="ml-4 text-m font-bold text-blue-700 lg:mb-0">{{ $score->cadeau_name_en }}</span>    
                                                    @elseif($locale =='es')
                                                    <span href="#"
                                                          class="ml-4 text-m font-bold text-blue-700 lg:mb-0">{{ $score->cadeau_name_es }}</span>    
                                                    @elseif($locale =='it')
                                                    <span href="#"
                                                          class="ml-4 text-m font-bold text-blue-700 lg:mb-0">{{ $score->cadeau_name_it }}</span>    
                                                    @endif

                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        @empty
                            <div class="swiper-slide">
                                <blockquote>
                                    <div
                                        class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">
                                        <div class="flex">
                                            <img alt="" class="inline-block object-center w-12 h-12"
                                                 src="./img/gem10.png">
                                            <div class="flex">
                                                <h2 class="pb-2 pl-4 font-semibold md:text-xl">
                                                    Dummy<br>
                                                    <span href="#" class="ml-4 text-xs font-bold text-blue-700 lg:mb-0">Bonus 10 ✧</span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </winner>

    <!-- CADEAU -->
    <div id="concept"></div>
    <container id="how" class="block py-16 mx-8 border-gray-600 max-w-7xl md:mx-auto">
        <section class="text-gray-400 body-font">
            <div class="flex flex-col items-center">
                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Gagnez des cadeaux')}}</h1>
            </div>
            <div class="container flex flex-wrap px-5 py-8 mx-auto">
                @php $steps = [
                [
                    'icon' => 'fa-solid fa-user fa-2x',
                    'title' => __('Inscrivez-vous gratuitement'),
                    'description' => __("L'inscription est rapide, gratuite, on vous offre 150 diamants pour bien commencer et vous bénéficiez d'un ticket à gratter chaque jour pour le jeu Egypt ainsi que de 10 parties gratuites par jour pour le jeu multijoueur GoFRUITS.")
                ],
                [
                    'icon' => 'fa-solid fa-gamepad fa-2x',
                    'title' => __('Jouer à des jeux'),
                    'description' => __("Sur GoKDO.com vous aurez le choix, nous proposons des jeux multijoueurs, jeux de grille, jeux de chasse au trésor, jeux de pêche, mais également des tickets de jeux à gratter.")
                ],
                [
                    'icon' => 'fa-regular fa-gem fa-2x',
                    'title' => __('Gagnez des Diamants, Rubis, Coins'),
                    'description' => __("Tous les jeux que nous proposons vous permettent de gagner des lots tels que des Diamants, Rubis ou encore Coins. Les Diamants et Coins vous seront utile pour les convertir en cadeaux, les Rubis vous permettrons de jouer sur certains jeux.")
                ],
                [
                    'icon' => 'fa-solid fa-gift fa-2x',
                    'title' => __('Convertissez les en cadeaux'),
                    'description' => __("Notre site offre une variété de cadeaux attrayants, tels que la Playstation 5, le Cookéo, la plancha, la barre de son, les Rubis, ainsi que des cartes-cadeaux Amazon et de la cryptomonnaie (crypto satoshi). De plus, vous pouvez retirer votre gain via Paypal gratuitement. Cette offre est une excellente opportunité pour les joueurs de remporter des prix incroyables tout en profitant d'une expérience de jeu amusante et excitante.")
                ]
            ]; @endphp
                @foreach($steps as $index => $step)
                    <div
                        class="relative flex pb-{{ $index == count($steps) - 1 ? '10' : '20' }} mx-auto sm:items-center md:w-2/3">
                        <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                            <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white bg-blue-500 rounded-full sm:mt-0 title-font">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                            <div
                                class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-blue-500 bg-indigo-100 rounded-full">
                                <i class="{{ $step['icon'] }}"></i>
                            </div>
                            <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                                <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{ $step['title'] }}</h2>
                                <p class="leading-relaxed text-gray-300">{{ $step['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </container>

    <!-- FREE GAMES -->
    <container id="game" class="block px-2 pb-8 mx-auto md:px-4 md:pt-8 max-w-7xl">
        <section id="video" class="text-gray-400 border-gray-600 body-font">
            <div
                class="px-12 py-12 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <div class="w-full text-left">
                    <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeux gratuits')}}</h1>
                    <p class="mb-8 text-base leading-relaxed text-gray-300 lg:w-3/3">
                        {{__("Notre site GoKDO vous offre la possibilité de jouer gratuitement à des jeux divertissants et de remporter des cadeaux !")}}
                        <br>
                        <a href="admin/register"
                           class="text-blue-500 prevent">{{__("L'inscription est gratuite")}}</a> {{__("et vous bénéficiez même de 150 Diamants offerts dès votre inscription. Cette offre est une excellente occasion de s'amuser tout en ayant la chance de remporter des cadeaux intéressants. En jouant sur notre site, vous pouvez profiter d'une expérience de jeu passionnante tout en augmentant vos chances de gagner de superbes prix.")}}
                    </p>
                </div>
            </div>
        </section>
    </container>
@endif
@if($isMobile == true)
<script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="378356"></ins>
<script>(adsurfebe = window.adsurfebe || []).push({});</script>
@else
<script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="378356"></ins>
<script>(adsurfebe = window.adsurfebe || []).push({});</script>
@endif