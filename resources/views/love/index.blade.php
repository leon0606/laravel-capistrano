<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>此网页谨献给黄姗小仙女</title>

    <style type="text/css">
        @font-face {
            font-family: digit;
            src: url('digital-7_mono.ttf') format("truetype");
        }
    </style>

    <link href="/css/default.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/garden.js"></script>
    <script type="text/javascript" src="/js/functions.js"></script>

</head>

<body>

<div id="mainDiv">
    <div id="content">
        <div id="code">
            <span class="comments">/**</span><br />
            <span class="space"/><span class="comments">*2019—05-20</span><br />
            <span class="space"/><span class="comments">*/</span><br />
            Boy name = <span class="keyword">Mr</span> WU<br />
            Girl name = <span class="keyword">Mrs</span> HUANG<br />
            <span class="comments"></span><br />
            I don't know what to say<br />
            <span class="comments"></span><br />
            Baby, I just want to say that I'm lucky to know you!<br />
            <!-- <span class="comments">// AS time goes on.</span><br />
            The boy can not be separated the girl;<br />
            <span class="comments">// At the same time.</span><br />
            The girl can not be separated the boy;<br />
            <span class="comments">// Both wind and snow all over the sky.</span><br />
            <span class="comments">// Whether on foot or 5 kilometers.</span><br />
            <span class="keyword">The boy</span> very <span class="keyword">happy</span>;<br />
            <span class="keyword">The girl</span> is also very <span class="keyword">happy</span>;<br />
            <span class="placeholder"/><span class="comments">// Whether it is right now</span><br />
            <span class="placeholder"/><span class="comments">// Still in the distant future.</span><br />
            <span class="placeholder"/>The boy has but one dream;<br />
            <span class="comments">// The boy wants the girl could well have been happy.</span><br />
            <br> -->
            <!-- <br>
            I don't know what to say<br />
            Baby, I just want to say that I'm lucky to know you<br /> -->
        </div>
        <div id="loveHeart">
            <canvas id="garden"></canvas>
            <div id="words">
                <div id="messages">
                    亲爱的小仙女，这是我们相识的时光。
                    <div id="elapseClock"></div>
                </div>
                <div id="loveu">
                    Love you three thousand times<br/>
                    <div class="signature">- 吴孝亮(leon)</div>
                </div>
            </div>
        </div>
    </div>
</div>
<audio autoplay loop id="audiojs">
    <source src="/music/soYBAFVAMvWAMYLyAD_-d3dY6FU226.mp3" type="audio/mpeg">
</audio>

<script type="text/javascript">
    var offsetX = $("#loveHeart").width() / 2;
    var offsetY = $("#loveHeart").height() / 2 - 55;
    var together = new Date();
    together.setFullYear(2019, 03, 03);
    together.setHours(20);
    together.setMinutes(0);
    together.setSeconds(0);
    together.setMilliseconds(0);
    if (!document.createElement('canvas').getContext) {
        var msg = document.createElement("div");
        msg.id = "errorMsg";
        msg.innerHTML = "Your browser doesn't support HTML5!<br/>Recommend use Chrome 14+/IE 9+/Firefox 7+/Safari 4+";
        document.body.appendChild(msg);
        $("#code").css("display", "none")
        $("#copyright").css("position", "absolute");
        $("#copyright").css("bottom", "10px");
        document.execCommand("stop");
    } else {
        setTimeout(function () {
            startHeartAnimation();
        }, 5000);

        timeElapse(together);
        setInterval(function () {
            timeElapse(together);
        }, 500);

        adjustCodePosition();
        $("#code").typewriter();
    }

    document.addEventListener('DOMContentLoaded', function () {
        function audioAutoPlay() {
            var audio = document.getElementById('audiojs');
            audio.play();
            document.addEventListener("WeixinJSBridgeReady", function () {
                audio.play();
            }, false);
        }
        audioAutoPlay();
    });

    if (/i(Phone|P(o|a)d)/.test(navigator.userAgent)) {
        $(document).one('touchstart',
            function(e) {
                $('#audiojs').get(0).touchstart = true;
                $('#audiojs').get(0).play();
                return false;
            });
    }
</script>
</body>
</html>