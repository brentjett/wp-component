# WordPress Components API

WordPress currently has three different expressions of a partial view. Inside the Visual editor, there are shortcodes, inside sidebars there are widgets, and in template files there are template parts. Widgets have always had a way of expressing fields through the form() method but currently requires you to write the connections for saving those fields. Shortcodes have always accepted attributes as their input but with the recent work on the Shortcake plugin being recommended for core inclusion, shortcodes go a step further and have their own fields API for declaring their fields. Template parts do not currently have any sort of input fields expression beyond the second "variant" parameter passed to the get_template_part() function but could benefit from them greatly.

Because these 3 expressions seek to accomplish essentially the same goal, output something visual and reusable, this leads me to suggest that WordPress might benefit from a unified format. Declare once, use everywhere.
