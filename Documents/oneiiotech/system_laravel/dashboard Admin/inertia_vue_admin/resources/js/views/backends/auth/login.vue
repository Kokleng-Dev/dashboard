<template>
    <Head>
        <title>{{ __('Login') }}</title>
    </Head>
    <div class="star"></div>
    <div :class="`meteor-${i + 1}`" v-for="(i, index) in 15" :key="index"></div>
    <div class="d-flex justify-content-center align-items-center vh-100 vw-100">
        <div class="row">
            <div class="col-lg-12 col h-75">
                <div class="h-100 d-flex align-items-center justify-content-center">
                    <form method="POST" id="formCreate" @submit.prevent="handleLogin($event)" novalidate>
                        <div class="card border-info">
                            <div class="card-header border-primary">
                                <h2 class="text-center">{{ __('Login') }}</h2>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="username" class="form-group mb-1">{{ __('Username') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-bounding-box"></i></span>
                                        <input v-model="form.username" type="text" id="username" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-group mb-1">{{ __('Password') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-key"></i></span>
                                        <input v-model="form.password"  :type="!check ? 'password' : 'text'" id="password" class="form-control" required>
                                        <span @click="check = !check"><i class="bi bi-eye-slash btn btn-outline-primary rounded-start-0" id="eye"></i></span>
                                    </div>
                                </div>
                                <button type="submit" :disabled="form.processing" class="btn btn-outline-primary float-end">
                                    <Spinner v-if="form.processing"/>
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</template>


<script>
import blank from '@/components/backends/layouts/blank.vue'
export default {
    layout: blank,
}
</script>
<script setup>
    const check = $ref(false);
    const form = $useForm({
        username: '',
        password: '',
    })

    async function handleLogin(e){
        try {
            await $handleForm.POST({
                event : e,
                form : form,
                url : $route('admin.login')
            });
        } catch (error) {
            console.log(error);
        }
    }
</script>

<style>

html,
body {
    /* background-image: url('https://htmlcolorcodes.com/assets/images/html-color-codes-color-tutorials-hero.jpg'); */
    background-image: url('@/public/assets/img/spider.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    height: 100%;
    z-index: -3;
    position: relative;
    overflow: hidden;
    /* background-image: radial-gradient(ellipse at top, #080e21 0%, #1b2735 95%) !important; */
}

    .star {
        width: 1px;
        height: 1px;
        background: transparent;
        box-shadow: 1017px 907px #fff, 665px 566px #fff, 465px 996px #fff, 841px 812px #fff, 591px 316px #fff, 262px 32px #fff, 1285px 331px #fff, 1046px 543px #fff, 1369px 151px #fff, 409px 280px #fff, 286px 517px #fff, 176px 521px #fff, 1036px 591px #fff, 1108px 824px #fff, 1056px 775px #fff, 279px 748px #fff, 58px 115px #fff, 1065px 63px #fff, 1898px 836px #fff, 445px 897px #fff, 537px 880px #fff, 959px 743px #fff, 1570px 276px #fff, 903px 202px #fff, 642px 702px #fff, 1068px 678px #fff, 1681px 869px #fff, 13px 294px #fff, 811px 316px #fff, 1238px 560px #fff, 923px 929px #fff, 1389px 37px #fff, 10px 732px #fff, 1863px 337px #fff, 974px 603px #fff, 1455px 574px #fff, 596px 71px #fff, 720px 645px #fff, 171px 371px #fff, 812px 968px #fff, 960px 449px #fff, 1722px 635px #fff, 843px 532px #fff, 33px 534px #fff, 1553px 775px #fff, 589px 777px #fff, 868px 306px #fff, 264px 245px #fff, 617px 316px #fff, 541px 440px #fff, 994px 657px #fff, 58px 654px #fff, 649px 181px #fff, 1671px 255px #fff, 815px 200px #fff, 1254px 884px #fff, 879px 89px #fff, 845px 22px #fff, 64px 68px #fff, 761px 318px #fff, 1069px 620px #fff, 454px 165px #fff, 856px 977px #fff, 254px 336px #fff, 1063px 617px #fff, 879px 133px #fff, 1141px 55px #fff, 1487px 557px #fff, 511px 693px #fff, 963px 886px #fff, 262px 742px #fff, 25px 249px #fff, 1446px 723px #fff, 1178px 732px #fff, 1472px 719px #fff, 428px 995px #fff, 1895px 398px #fff, 878px 601px #fff, 36px 326px #fff, 1482px 83px #fff, 380px 19px #fff, 1682px 857px #fff, 760px 421px #fff, 227px 647px #fff, 798px 67px #fff, 1173px 484px #fff, 934px 391px #fff, 1050px 227px #fff, 1050px 207px #fff, 89px 690px #fff, 990px 754px #fff, 1918px 803px #fff, 1439px 507px #fff, 445px 901px #fff, 1821px 477px #fff, 987px 210px #fff, 1206px 102px #fff, 562px 538px #fff, 911px 119px #fff, 36px 56px #fff, 412px 625px #fff, 1198px 267px #fff, 8px 369px #fff, 1595px 580px #fff, 1875px 17px #fff, 628px 283px #fff, 400px 137px #fff, 1072px 574px #fff, 1192px 45px #fff, 287px 668px #fff, 567px 490px #fff, 663px 732px #fff, 1056px 811px #fff, 723px 935px #fff, 1187px 738px #fff, 190px 148px #fff, 162px 934px #fff, 757px 905px #fff, 659px 864px #fff, 483px 606px #fff, 570px 529px #fff, 1092px 492px #fff, 491px 59px #fff, 439px 973px #fff, 1316px 187px #fff, 1012px 765px #fff, 149px 540px #fff, 1055px 330px #fff, 1807px 611px #fff, 766px 253px #fff, 1095px 464px #fff, 95px 219px #fff, 1036px 643px #fff, 449px 96px #fff, 479px 982px #fff, 1229px 195px #fff, 307px 357px #fff, 478px 443px #fff, 1450px 163px #fff, 639px 592px #fff, 1304px 167px #fff, 1195px 562px #fff, 1657px 958px #fff, 212px 340px #fff, 1264px 86px #fff, 379px 119px #fff, 703px 855px #fff, 1352px 712px #fff, 1866px 991px #fff, 32px 198px #fff, 566px 90px #fff, 1787px 870px #fff, 1883px 229px #fff, 1021px 564px #fff, 1643px 199px #fff, 1096px 516px #fff, 709px 242px #fff, 628px 74px #fff, 591px 353px #fff, 1814px 427px #fff, 866px 858px #fff, 1879px 883px #fff, 221px 511px #fff, 567px 768px #fff, 1358px 119px #fff, 642px 648px #fff, 1396px 646px #fff, 725px 797px #fff, 1854px 550px #fff, 114px 744px #fff, 513px 358px #fff, 1372px 1000px #fff, 424px 495px #fff, 1253px 462px #fff, 1518px 647px #fff, 1159px 801px #fff, 830px 597px #fff, 82px 397px #fff, 950px 938px #fff, 1013px 819px #fff, 551px 752px #fff, 1728px 528px #fff, 841px 645px #fff, 499px 305px #fff, 385px 989px #fff, 1101px 691px #fff, 1632px 132px #fff, 853px 111px #fff, 1822px 745px #fff, 358px 718px #fff, 860px 768px #fff, 1617px 290px #fff, 138px 442px #fff, 1844px 196px #fff, 304px 146px #fff, 515px 795px #fff, 553px 480px #fff, 424px 619px #fff, 230px 378px #fff, 1445px 951px #fff, 834px 763px #fff, 1027px 524px #fff, 1050px 851px #fff, 894px 610px #fff, 1912px 789px #fff, 221px 238px #fff, 1726px 610px #fff, 1074px 717px #fff, 818px 221px #fff, 1350px 698px #fff, 1195px 403px #fff, 296px 637px #fff, 863px 312px #fff, 341px 648px #fff, 1847px 657px #fff, 732px 699px #fff, 1319px 958px #fff, 1225px 448px #fff, 1451px 12px #fff, 1829px 51px #fff, 488px 224px #fff, 873px 319px #fff, 705px 14px #fff, 1333px 674px #fff, 505px 548px #fff, 220px 397px #fff, 1424px 103px #fff, 352px 944px #fff, 1641px 478px #fff, 239px 201px #fff, 1553px 339px #fff, 901px 685px #fff, 1465px 710px #fff, 1473px 468px #fff, 1631px 304px #fff, 123px 408px #fff, 475px 235px #fff, 1830px 200px #fff, 289px 622px #fff, 831px 776px #fff, 200px 552px #fff, 1758px 272px #fff, 1807px 326px #fff, 1400px 750px #fff, 1232px 806px #fff, 378px 392px #fff, 1850px 406px #fff, 334px 241px #fff, 787px 386px #fff, 1301px 817px #fff, 871px 773px #fff, 54px 601px #fff, 784px 342px #fff, 509px 356px #fff, 1639px 853px #fff, 891px 471px #fff, 1496px 957px #fff, 971px 246px #fff, 1447px 694px #fff, 503px 195px #fff, 447px 587px #fff, 1448px 322px #fff, 1883px 470px #fff, 905px 780px #fff, 829px 882px #fff, 961px 257px #fff, 1326px 371px #fff, 667px 997px #fff, 1418px 402px #fff, 1779px 231px #fff, 678px 165px #fff, 409px 444px #fff, 515px 212px #fff, 1422px 165px #fff, 1371px 49px #fff, 270px 731px #fff, 1390px 60px #fff, 1847px 464px #fff, 510px 116px #fff, 1431px 331px #fff, 1054px 168px #fff, 218px 808px #fff, 447px 13px #fff, 240px 734px #fff, 1654px 288px #fff, 1531px 498px #fff, 668px 962px #fff, 454px 304px #fff, 437px 868px #fff, 1087px 938px #fff, 15px 837px #fff, 1149px 531px #fff, 1771px 869px #fff, 788px 138px #fff, 690px 582px #fff, 641px 424px #fff, 1313px 508px #fff, 332px 903px #fff, 853px 664px #fff, 54px 590px #fff;
    }

    .meteor-1 {
        position: absolute;
        top: 226px;
        left: 92%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 9s linear infinite;
    }

    .meteor-1:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-2 {
        position: absolute;
        top: 178px;
        left: 57%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 4.2s linear infinite;
    }

    .meteor-2:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-3 {
        position: absolute;
        top: 273px;
        left: 68%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 5.4s linear infinite;
    }

    .meteor-3:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-4 {
        position: absolute;
        top: 74px;
        left: 36%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 4.9s linear infinite;
    }

    .meteor-4:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-5 {
        position: absolute;
        top: 209px;
        left: 17%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 3.2s linear infinite;
    }

    .meteor-5:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-6 {
        position: absolute;
        top: 89px;
        left: 67%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 9.9s linear infinite;
    }

    .meteor-6:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-7 {
        position: absolute;
        top: 233px;
        left: 20%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 4.6s linear infinite;
    }

    .meteor-7:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-8 {
        position: absolute;
        top: 72px;
        left: 25%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 3.8s linear infinite;
    }

    .meteor-8:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-9 {
        position: absolute;
        top: 291px;
        left: 79%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 8.9s linear infinite;
    }

    .meteor-9:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-10 {
        position: absolute;
        top: 169px;
        left: 61%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 9.8s linear infinite;
    }

    .meteor-10:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-11 {
        position: absolute;
        top: 176px;
        left: 50%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 5.7s linear infinite;
    }

    .meteor-11:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-12 {
        position: absolute;
        top: 217px;
        left: 93%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 4.4s linear infinite;
    }

    .meteor-12:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-13 {
        position: absolute;
        top: 156px;
        left: 92%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 8.7s linear infinite;
    }

    .meteor-13:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-14 {
        position: absolute;
        top: 295px;
        left: 90%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 5.2s linear infinite;
    }

    .meteor-14:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    .meteor-15 {
        position: absolute;
        top: 196px;
        left: 73%;
        width: 300px;
        height: 1px;
        transform: rotate(-45deg);
        background-image: linear-gradient(to right, #fff, rgba(255, 255, 255, 0));
        animation: meteor 5.5s linear infinite;
    }

    .meteor-15:before {
        content: "";
        position: absolute;
        width: 4px;
        height: 5px;
        border-radius: 50%;
        margin-top: -2px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 0 15px 3px #fff;
    }

    @keyframes meteor {
        0% {
            opacity: 1;
            margin-top: -300px;
            margin-right: -300px;
        }

        12% {
            opacity: 0;
        }

        15% {
            margin-top: 300px;
            margin-left: -600px;
            opacity: 0;
        }

        100% {
            opacity: 0;
        }
    }

    #content {
        margin: 0px !important;
    }

    .login {
        position: relative;
        background: transparent;
    }

    .login::after {
        content: '';
        width: 100%;
        height: 100%;
        /* background-color: #e3f2fd; */
        /* background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,212,255,1) 0%, rgba(9,9,121,1) 79%); */
        border-radius: 72% 28% 53% 47% / 36% 51% 49% 64%;
        position: absolute;
        top: 0px;
        left: 0px;
        z-index: -1;
        -webkit-animation: mover 1s infinite alternate;
        animation: mover 3s infinite alternate;
    }

    @-webkit-keyframes mover {
        0% {
            transform: translateY(20px) translatex(-10px);
            box-shadow: 0px 0px 0.1px 0px #e3f2fd;
        }

        100% {
            transform: translateY(50px) translatex(30px);
            box-shadow: 0px 0px 50px 20px #e3f2fd;
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(20px) translatex(-10px);
            box-shadow: 0px 0px 0.1px 0px #e3f2fd;
        }

        100% {
            transform: translateY(50px) translatex(30px);
            box-shadow: 0px 0px 50px 20px #e3f2fd;
        }
    }
</style>