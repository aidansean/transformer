from project_module import project_object, image_object, link_object, challenge_object

p = project_object('transformer', 'Image transformer')
p.domain = 'http://www.aidansean.com/'
p.folder_name = 'aidansean'
p.path = 'transformer'
p.preview_image    = image_object('%s/images/project.jpg'   %p.path, 150, 250)
p.preview_image_bw = image_object('%s/images/project_bw.jpg'%p.path, 150, 250)
p.github_repo_name = 'transformer'
p.mathjax = True
p.tags = 'Images,Maths'
p.technologies = 'HTML,PHP'
p.links.append(link_object(p.domain, 'transformer', 'Live page'))
p.introduction = 'When I discovered I could manipulate images with PHP one of the first things I wanted to do was perform coordinate transformations.  They have fascinated me since I first came across them and so I developed this project to satifsy my curiosity about what a skyline might look like when transformed into polar coordinates.'
p.overview = '''This project takes an image and uses PHP to manipulate it pixel by pixel so that the \\((x,y)\\) coordinates get translated into \\((r,\\theta\\) coordinates.'''

p.challenges.append(challenge_object('The transformation itself isn\'t trivial.', 'The first difficulty to overcome is the transformation itself.  The details are given on the page, so I won\'t reproduce them here.', 'Resolved'))

p.challenges.append(challenge_object('The transformation has to be performed "backwards".', 'It took me a while to realise that the transformation has to be performed from target to source rather than the other way around.  Rather than taking a pixel from source to the target, the pixel must be taken from the target to the source, because otherwise the target image will have "gaps" in it.', 'Resolved'))
