  ID  LEGENDA
 * ID-1 = PopularMovies                     
 -- https://api.themoviedb.org/3/movie/popular?api_key=$this->ApiKey&page=$page
 * ID-2 = Single movie on ID                
 -- https://api.themoviedb.org/3/movie/$movieID?api_key=$this->ApiKey
 * ID-3 = Search for a movie                
 -- https://api.themoviedb.org/3/search/movie?api_key=$this->ApiKey&query=" .str_replace(" ", "%20", $search). ";
 * ID-4 = Get genres                        
 -- https://api.themoviedb.org/3/genre/movie/list?api_key=$this->ApiKey
 * ID-5 = Get similar movies                
 -- https://api.themoviedb.org/3/movie/$movieID/similar?api_key=$this->ApiKey&page=1
 * ID-6 = Get movie list with one genre     
 -- https://api.themoviedb.org/3/discover/movie?api_key=$this->ApiKey&sort_by=popularity.desc&include_video=false&page=1&with_genres=$genre
 
