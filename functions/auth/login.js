const users = require('../helpers/users.json');

exports.handler = async (event) => {
  try {
    const { studentId, password } = JSON.parse(event.body);
    const user = users.find(u => u.studentId === studentId && u.password === password);
    
    if (!user) {
      return {
        statusCode: 401,
        body: JSON.stringify({ error: 'Invalid credentials' })
      };
    }

    return {
      statusCode: 200,
      body: JSON.stringify({ 
        token: "test-token", 
        user: {
          name: user.name,
          grade: user.grade,
          section: user.section
        }
      })
    };
  } catch (err) {
    return {
      statusCode: 500,
      body: JSON.stringify({ error: err.message })
    };
  }
};
