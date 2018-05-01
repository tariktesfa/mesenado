animal(dog).
has(dog,fur).
barks(dog).
dog(X):-has(X,fur),barks(X).

