# Тестовое задание Вконтакте
Приложение предоставляет консольной интерфейс игры. 
При запуске генерируется карта и представляет собой неограниченный
набор комнат для передвежения Назад, Налево, Направо. Для пердвижения
используются команды:
- Для передвижения в предыдующую комнату - 1
- Для передвижения в левую комнату - 2
- Для передвижения в правую комнату - 3

При входе в комнату автоматически пользователь взаимодейтсвует 
с объектом (клад или монстр). После взаимодействия игроку начисляется 
определенное количество очков, зависещее от объекта взаимодействия.
### Формат карты
Карта предствляет собой json файл с объектами комнат. 
У каждой комнаты есть вложенный объект next, который 
хранит в себе прилегающей к этой комнате комнаты. Пример файла
карты можно увидеть в **/configs/map.json**.


### Запуск проекта

```shell
docker build -t game .
docker run -it --rm --name running-game game
```
