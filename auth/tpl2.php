				</div>
				<div id="footer">
					<?php
						if (isset($page) AND $page === 'index')
						{
							include_once 'footer.php';
						}
						else
						{
							include_once '../footer.php';
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>