
delta(A, B, C, D):- D is B*B - 4*A*C.
equation(A,B,C,X) :-
 delta(A,B,C,D1),
 (  D1 < 0
 -> X is 0
 ;  D1 =:= 0
 -> X is -B/2*A
 ;  X is -B-sqrt(D1)/2*A).
