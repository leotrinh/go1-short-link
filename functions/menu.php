<nav class="navbar navbar-fixed-bottom navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <?php echo $info['name']; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="about">About</a></li>
                <li><a href="tos">Terms</a></li>
                <li><a href="contact">Contact</a></li>
                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#bookmarklet-modal">Bookmarklet</a></li>
                <li><a href="api-about">Api</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="statics.php">Links</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<div id="bookmarklet-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Bookmarklet</h4>
            </div>
            <div class="modal-body">
                <p><?php echo $info['name']; ?> Bookmarklet help you generate quick shorturls without leaving your website.</p>
                <p>Drag the link below to the bookmarks bar to install the bookmarklet.</p>
                <p><a href="javascript:(async () => {if (!window.shorturl) {const poop = await fetch('<?php echo $info['URL']?>/api.php?url=' + encodeURI(location.href)).then(x => x.json());window.shorturl = poop.shorturl ? poop.shorturl : poop.error;}console.log(window.shorturl);const elements = {}; elements.container = document.createElement('div');elements.container.style.cssText = 'z-index:10000;';elements.modal = document.createElement('div');elements.modal.style.cssText = 'z-index:10000;position:fixed;box-shadow: 0 5px 15px -5px rgba(0,0,0,0.8);display:inline-block;color:black;padding:24px;background-color:white;bottom:12px;left:12px;border-radius:12px;font-size:18px;transition:all 250ms ease;opacity:0';elements.a = document.createElement('a');elements.a.innerText = window.shorturl;elements.a.href = window.shorturl;elements.a.addEventListener('click',(e)=>{e.preventDefault();});elements.p = document.createElement('p');elements.p.style.cssText = 'padding:0;margin:0;';elements.p.innerHTML = `<br>Brought to you by <a href='<?php echo $info['URL']?>'><?php echo $info['name']?></a>`;elements.modal.appendChild(elements.a);elements.modal.appendChild(elements.p);elements.container.appendChild(elements.modal);const body = document.querySelector('body');body.appendChild(elements.container);requestAnimationFrame(()=>{requestAnimationFrame(()=>{elements.modal.style.opacity = 1;})});setTimeout(()=>{elements.modal.style.opacity = 0;setTimeout(()=>{elements.container.remove();},260);},5000);})();">Short this link</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    const bookmarklet = () => {
        alert("Here I am!")
    }
</script>