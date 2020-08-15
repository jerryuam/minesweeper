# API Important notes.

Before to start coding, I analized the API needs and I designed the database structure and API services. Then I did the models and the migrations. 

There are four databases that for game data storing:
- Players; it storages players data mainly player nickname
- ScoresGames; it storages games scores from completed games asociated with one player.
- SavedGames; it storages games progress asociated with one player.
- LevelsGame; it storages games levels, its a catalog.

When the migrations and the controllers was completed I filled the levels_game table using a seed and then I did the API test on REST API tool for Google Chrome.



