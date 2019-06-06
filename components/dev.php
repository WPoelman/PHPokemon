<!--                                   -->
<!-- developer screen, remove for prod -->
<!--                                   -->
<div id="dev-screen" class="dev">
	<p>
		Hier zie je alle tools die handig zijn voor developers
	</p>
	<div>
		<button class="btn" onclick="post('stop_game').then(()=>{console.log('game clear'); window.location.reload()})">
			reset game
		</button>
	</div>
	<br/>
	<div>
		<button class="btn"
		        onclick="post('reset_player').then(()=>{console.log('player clear'); window.location.reload()})">
			reset sessie
		</button>
	</div>
	<br/>
	<div>
		<button class="btn"
		        onclick="dummy()">
			dummy player
		</button>
	</div>
	<br/>

</div>