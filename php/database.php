<?php
require_once 'config.php';

//joins the tables and creates a usable array
function sorted_music_list() {}

//search song with query passing
function search_song() {}

//show all songs in the database
function navigation_link() {}

//view single song by clicking a link
function single_song() {}

//add button to add a song to favorites, includes remove from favorites and remove all
function add_to_favorites() {}

//top genres based on song amount 
function top_genres() {}

//top artists based on song amount
function top_artists() {}

//top song based on popularity
function most_pop_song() {}

//artists with one song sorted by popularity
function one_hit_wonders() {}

//longest acoustic song based on Acousticness Value > 40 sorted by popularity
function long_acoustic() {}

//club songs with danceability of >80 (danceability * 1.6 + energy * 1.4, sorted by desc)
function club() {}

//songs to run to (bpm 120-125) (energy * 1.3 + valence * 1.6 sorted by desc)
function running_song() {}

//studying (bmp 100-115 AND speechiness 1-20) (acousticness * 0.8 + speechiness 100 + valence 100, sorted by desc)
function studying_song() {}


?>