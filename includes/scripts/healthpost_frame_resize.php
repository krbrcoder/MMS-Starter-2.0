<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <script language="javascript">

		if (typeof(window.parent.parent.hpResizeFrame) == 'function') {

			var l = location.href;
			var p = l.indexOf('?height=');
			if (p == -1) {
				p = l.indexOf('&height=');
			}

			if (p != -1) {
				p += 8;
				var p2 = l.indexOf('&', p);

				if (p2 == -1) {
					p2 = l.length;
				}

				window.parent.parent.hpResizeFrame((l.substring(p, p2) - 0) + 'px', l.indexOf('scroll=0') == -1);
			}
		}
    </script>
</head>
<body>
</body>
</html>