$(document).ready(function() {
    // Integer Array Operations
    $(document).on('click', '#search-integer', function() {
        searchInteger();
    });

    $(document).on('click', '#sort-integer', function() {
        sortInteger();
    });

    function searchInteger() {
        var array = $('#integer-array').val().split(',').map(Number);
        var searchValue = parseInt(prompt('Enter the integer to search for:'));
        var index = array.indexOf(searchValue);
        if (index !== -1) {
            $('#integer-result').html(`Integer ${searchValue} found at index ${index}.`);
        } else {
            $('#integer-result').html(`Integer ${searchValue} not found.`);
        }
    }

    function sortInteger() {
        var array = $('#integer-array').val().split(',').map(Number);
        array.sort(function(a, b) {
            return a - b;
        });
        $('#integer-result').html(`Sorted Array: [${array.join(', ')}]`);
    }

    // Named Entities Array Operations
    $(document).on('click', '#search-entity', function() {
        searchEntity();
    });

    $(document).on('click', '#sort-entity', function() {
        sortEntity();
    });

    function searchEntity() {
        var array = $('#entity-array').val().split(',');
        var searchValue = prompt('Enter the named entity to search for:').trim().toLowerCase();
        var index = array.findIndex(function(entity) {
            return entity.trim().toLowerCase() === searchValue;
        });
        if (index !== -1) {
            $('#entity-result').html(`Entity "${array[index]}" found at index ${index}.`);
        } else {
            $('#entity-result').html(`Entity "${searchValue}" not found.`);
        }
    };

    function sortEntity() {
        var array = $('#entity-array').val().split(',');
        array.sort();
        $('#entity-result').html(`Sorted Array: [${array.join(', ')}]`);
    }
});
