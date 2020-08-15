# API Important notes.

Before to start coding, I analized the API needs and I designed the database structure and API services. Then I did the models and the migrations. 

There are four databases that for game data storing:
- Players; it storages players data mainly player nickname
- ScoresGames; it storages games scores from completed games asociated with one player.
- SavedGames; it storages games progress asociated with one player.
- LevelsGame; it storages games levels, its a catalog.

When the migrations and the controllers was completed I filled the levels_game table using a seed and then I did the API test on REST API tool for Google Chrome.

Bad news; I spent lot of time trying to find a bug when I tried to get the number of mines around one cell and then I found that the validation into one if needed to be done with ===, it's odd because I think if($var=="M") must works without ===. It had not happened to me before I think it could came from new Laravel version.

After a long night the new game board its ready; it has a "M" mine flag and a numbers in each cell (each cell without a mine) that show how many mines are sorrounding it.