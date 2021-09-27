199

Some use cases of looping through an array in the functional programming way in JavaScript:

1. Just loop through an array
const myArray = [{x:100}, {x:200}, {x:300}];

myArray.forEach((element, index, array) => {
    console.log(element.x); // 100, 200, 300
    console.log(index); // 0, 1, 2
    console.log(array); // same myArray object 3 times
});
Note: Array.prototype.forEach() is not a functional way strictly speaking, as the function it takes as the input parameter is not supposed to return a value, which thus cannot be regarded as a pure function.

2. Check if any of the elements in an array pass a test
const people = [
    {name: 'John', age: 23}, 
    {name: 'Andrew', age: 3}, 
    {name: 'Peter', age: 8}, 
    {name: 'Hanna', age: 14}, 
    {name: 'Adam', age: 37}];

const anyAdult = people.some(person => person.age >= 18);
console.log(anyAdult); // true
3. Transform to a new array
const myArray = [{x:100}, {x:200}, {x:300}];

const newArray= myArray.map(element => element.x);
console.log(newArray); // [100, 200, 300]
Note: The map() method creates a new array with the results of calling a provided function on every element in the calling array.

4. Sum up a particular property, and calculate its average
const myArray = [{x:100}, {x:200}, {x:300}];

const sum = myArray.map(element => element.x).reduce((a, b) => a + b, 0);
console.log(sum); // 600 = 0 + 100 + 200 + 300

const average = sum / myArray.length;
console.log(average); // 200
5. Create a new array based on the original but without modifying it
const myArray = [{x:100}, {x:200}, {x:300}];

const newArray= myArray.map(element => {
    return {
        ...element,
        x: element.x * 2
    };
});

console.log(myArray); // [100, 200, 300]
console.log(newArray); // [200, 400, 600]
6. Count the number of each category
const people = [
    {name: 'John', group: 'A'}, 
    {name: 'Andrew', group: 'C'}, 
    {name: 'Peter', group: 'A'}, 
    {name: 'James', group: 'B'}, 
    {name: 'Hanna', group: 'A'}, 
    {name: 'Adam', group: 'B'}];

const groupInfo = people.reduce((groups, person) => {
    const {A = 0, B = 0, C = 0} = groups;
    if (person.group === 'A') {
        return {...groups, A: A + 1};
    } else if (person.group === 'B') {
        return {...groups, B: B + 1};
    } else {
        return {...groups, C: C + 1};
    }
}, {});

console.log(groupInfo); // {A: 3, C: 1, B: 2}
7. Retrieve a subset of an array based on particular criteria
const myArray = [{x:100}, {x:200}, {x:300}];

const newArray = myArray.filter(element => element.x > 250);
console.log(newArray); // [{x:300}] 
Note: The filter() method creates a new array with all elements that pass the test implemented by the provided function.

8. Sort an array
const people = [
  { name: "John", age: 21 },
  { name: "Peter", age: 31 },
  { name: "Andrew", age: 29 },
  { name: "Thomas", age: 25 }
];

let sortByAge = people.sort(function (p1, p2) {
  return p1.age - p2.age;
});

console.log(sortByAge);
enter image description here

9. Find an element in an array
const people = [ {name: "john", age:23},
                {name: "john", age:43},
                {name: "jim", age:101},
                {name: "bob", age:67} ];

const john = people.find(person => person.name === 'john');
console.log(john);
enter image description here

The Array.prototype.find() method returns the value of the first element in the array that satisfies the provided testing function.

References
Array.prototype.some()
Array.prototype.forEach()
Array.prototype.map()
Array.prototype.filter()
Array.prototype.sort()
Spread syntax
Array.prototype.find()