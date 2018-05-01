predicates
    grade(integer)
clauses
   grade(MARKS) :-
        MARKS >= 70, write('a'),nl.

    grade(MARKS) :-
        MARKS < 70, MARKS >= 60, write('b'),nl.
