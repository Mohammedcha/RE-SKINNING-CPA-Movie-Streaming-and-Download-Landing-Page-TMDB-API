# RE-SKINNING CPA Movie Landing Page - TMDB API

Introducing the ultimate solution for captivating movie landing pages tailored for CPA marketing: the meticulously crafted `Re-Skinning CPA Movie Landing Page`. This dynamic web application, expertly engineered with a seamless fusion of HTML, PHP, JS, and CSS, boasts a powerful integration with the `TMDB API`, empowering users to effortlessly source and display an extensive array of movies automatically.

Developed by the esteemed `Mohammed Cha` & `Re-Skinning Group`, this movie landing page is the epitome of efficiency and elegance, purposefully designed to enthrall audiences and drive optimal conversions. By harnessing the cutting-edge capabilities of the TMDB API, users can enjoy an expansive repository of films, effortlessly curated and presented within the interface, all at absolutely no cost.

With its intuitive design and user-friendly interface, the `Re-Skinning CPA Movie Landing Page` offers a seamless browsing experience, ensuring visitors can explore an extensive selection of movies with unprecedented ease. Whether it's the latest blockbusters or timeless classics, this platform guarantees a diverse range of cinematic options to cater to every taste and preference.

Empower your CPA marketing endeavors with the unparalleled convenience and sophistication of the `Re-Skinning CPA Movie Landing Page`, and witness a remarkable surge in user engagement and conversion rates. Discover a hassle-free approach to captivating your audience and driving your CPA marketing strategy to new heights, all at your fingertips, courtesy of `Re-Skinning Group's` innovative and groundbreaking offering.

<br>

## Features

1. **Automated Movie Fetching :**
	- The script automatically fetches movies from TheMovieDB API, ensuring an up-to-date collection of movies for users.

2. **Multi-Language Support :**
	- Users can access the Download / Watch the mmovies in five different languages - English, French, Spanish, German, and Italian.

3. **Movie Download Options :**
	- Users have the option to download movies in six different qualities upon completion of a CPA offer.

4. **Online Movie Streaming :**
	- Users can stream movies online. However, the movie playback is paused after a specific duration in `config.php`, prompting users to complete a CPA offer to continue watching.

5. **SEO Optimization :**
	- The script is optimized for search engines, ensuring that the website ranks well in search results, driving organic traffic.

6. **Mobile-Friendly Design :**
	- The website is designed to be responsive and mobile-friendly, providing an optimal viewing experience across various devices.

<br>

## Script Configuration Guide

The `config.php` file can be found in the `config` folder of the repository. To access it, navigate to the root directory and then open the `config` folder. In the `config.php` file, you can set various parameters and values to configure the website's functionality. 
Make sure to update the necessary fields as per the provided guidelines above.

<br>

```php

<?php  

  $Re_skinning_Grp_uri = 'https://www.re-skinning.com/cpa/landing6';	                 // Website Link
  
  $Re_skinning_Grp_wname = 'Movies';	                                                 // Website Title
  
  $Re_skinning_Grp_descrip = 'Free Movies';	                                         // Website Description

  $Re_skinning_Grp_adbluemedia_it = '1444147';	                                         // AdBlueMedia IT
  
  $Re_skinning_Grp_adbluemedia_key = 'e619c';	                                         // AdBlueMedia KEY

  $Re_skinning_Grp_ImdbApi = 'b7cd3340a794e5a2f35e3abb820b497f';	                 // Themoviedb API

  $Re_skinning_Grp_video_mp4 = 'https://cdn.jsdelivr.net/gh/iDevMore/tvs-vd1/nfx.mp4';	 // Video Link
  
  $Re_skinning_Grp_pause_time = '5';	                                                 // Time to Stop Movie

  $Re_skinning_Grp_comingsoon = '1';	                                                 // 1 to display
  
  $Re_skinning_Grp_related = '1'; 	                                                 // 1 to display

?>
```

<br>

To configure the RE-SKINNING CPA Movie Streaming and Download Landing Page, follow the steps below :

<br>

1. **Link to Website :**  `Example : https://example.com/`

2. **Website Name :** Your website name

3. **Website Description :** A short description for your website

4. **adbluemedia IT :** Your AdblueMedia Locker IT -  `Example : 1444147` - Get it from [adbluemedia](https://www.adbluemedia.com) 

5. **adbluemedia Key :** Your AdblueMedia Locker Key -  `Example : e619c` - Get it from [adbluemedia](https://www.adbluemedia.com) 

6. **TMDB API Key :** Your TMDB Api Key - `Example : b7cd3340a794e5a2f35e3abb820b497f` - Get it from [The Movie Database (TMDB)](https://developer.themoviedb.org/reference/intro/getting-started) 

7. **MP4 Video Link :** Your MP4 Video Link `Example : https://cdn.jsdelivr.net/gh/iDevMore/tvs-vd1/nfx.mp4`

8. **Set Time to Stop Movie :** Set the time in seconds to pause the movie and prompt users to complete a CPA offer: [Insert Time in Seconds] 

9. **Show Coming Soon :** Toggle to show or hide the "Coming Soon" section: [Insert `0` or `1`]

10. **Show Related Movies :** Toggle to show or hide related movies on the movie page: [Insert `0` or `1`]

<br>

Make sure to fill in the required information accurately. If you encounter any issues during the configuration process, refer to the script documentation for further guidance, or contact me here [Mohammed Cha](https://www.facebook.com/profile.php?id=100086219852248)
