female(tariku).
female(yordanos).
male(mamu).
female(gize).
male(henock).
father(henock,tariku).
father(henock,yordanos).
father(henock,mamu).
mother(gize,tariku).
mother(gize,yordanos).
mother(gize,mamu).
parent(X,Y):-male(X),father(X,Y).


